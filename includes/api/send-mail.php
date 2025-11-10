<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../vendor/autoload.php';

// --- configuracoes padrao de e-mail (sobrepõem variáveis de ambiente) ---
$configMail = [
    'host' => 'smtp.seudominio.com',   // ajuste aqui
    'port' => 587,
    'username' => 'usuario@seudominio.com',
    'password' => 'senha-super-secreta',
    'secure' => 'tls',                   // ssl | tls | ''
    'auth' => true,
    'from' => 'suporte@seudominio.com',
    'from_name' => 'Formulário OnePay',
    'to' => ['adm@1pay.com.br' => 'Time OnePay'],
    'cc' => ['jdinix@gmail.com' => 'Cópia OnePay'],
];

// permite sobrescrever via .env/variáveis
$configMail = array_merge($configMail, [
    'host' => getenv('SMTP_HOST') ?: $configMail['host'],
    'port' => (int) (getenv('SMTP_PORT') ?: $configMail['port']),
    'username' => getenv('SMTP_USERNAME') ?: $configMail['username'],
    'password' => getenv('SMTP_PASSWORD') ?: $configMail['password'],
    'secure' => getenv('SMTP_SECURE') ?: $configMail['secure'],
    'auth' => getenv('SMTP_AUTH') !== false ? filter_var(getenv('SMTP_AUTH'), FILTER_VALIDATE_BOOLEAN) : $configMail['auth'],
    'from' => getenv('SMTP_FROM') ?: $configMail['from'],
    'from_name' => getenv('SMTP_FROM_NAME') ?: $configMail['from_name'],
]);

function logSendMailError(string $message, array $context = []): void
{
    $logFile = __DIR__ . '/send-mail-error.log';
    $entry = sprintf(
        "[%s] %s%s%s",
        date('Y-m-d H:i:s'),
        $message,
        $context ? ' | ' . json_encode($context, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : '',
        PHP_EOL
    );

    try {
        file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
    } catch (Throwable $e) {
        error_log('send-mail log failure: ' . $e->getMessage());
    }
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido. Utilize POST.',
    ]);
    exit;
}

/**
 * Normaliza os dados recebidos tratando JSON e formulário tradicional.
 */
function collectPayload(): array
{
    if (!empty($_POST)) {
        return $_POST;
    }

    $rawBody = file_get_contents('php://input');
    if ($rawBody === false || $rawBody === '') {
        return [];
    }

    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    if (stripos($contentType, 'application/json') !== false) {
        $json = json_decode($rawBody, true);
        return is_array($json) ? $json : [];
    }

    if (stripos($contentType, 'application/x-www-form-urlencoded') !== false) {
        parse_str($rawBody, $form);
        return is_array($form) ? $form : [];
    }

    return [];
}

$payload = collectPayload();

$name = trim((string) ($payload['nome'] ?? $payload['name'] ?? ''));
$emailInput = trim((string) ($payload['email'] ?? ''));
$email = filter_var($emailInput, FILTER_VALIDATE_EMAIL) ?: '';
$phone = trim((string) ($payload['telefone'] ?? $payload['phone'] ?? ''));
$state = trim((string) ($payload['estado'] ?? $payload['state'] ?? ''));
$city = trim((string) ($payload['cidade'] ?? $payload['city'] ?? ''));
$experience = trim((string) ($payload['experiencia'] ?? $payload['experience'] ?? ''));
$customerBase = trim((string) ($payload['carteira'] ?? $payload['customer_base'] ?? ''));
$message = trim((string) ($payload['mensagem'] ?? $payload['message'] ?? ''));

if ($name === '' || $email === '') {
    http_response_code(422);
    logSendMailError('Requisição inválida em send-mail.php', [
        'reason' => 'nome/email ausentes',
        'payload' => $payload,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? null,
    ]);
    echo json_encode([
        'success' => false,
        'message' => 'Nome e e-mail são obrigatórios.',
    ]);
    exit;
}

try {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    if (!empty($configMail['host'])) {
        $mail->isSMTP();
        $mail->Host = $configMail['host'];
        $mail->Port = $configMail['port'];
        $mail->SMTPAuth = (bool) $configMail['auth'];
        if ($mail->SMTPAuth) {
            $mail->Username = $configMail['username'];
            $mail->Password = $configMail['password'];
        }
        $secure = strtolower((string) $configMail['secure']);
        if (in_array($secure, ['ssl', 'tls'], true)) {
            $mail->SMTPSecure = $secure;
        }
    } else {
        logSendMailError('SMTP_HOST não configurado; tentando mail()');
        $mail->isMail();
    }

    $mail->setFrom($configMail['from'], $configMail['from_name']);

    foreach ($configMail['to'] as $address => $name) {
        $mail->addAddress($address, $name);
    }
    foreach ($configMail['cc'] as $address => $name) {
        $mail->addCC($address, $name);
    }
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Nova solicitação de Licenciado';

    $logoCid = null;
    $logoPath = __DIR__ . '/../../images/logo-azul-onepay.svg';
    if (is_readable($logoPath)) {
        $mail->addEmbeddedImage($logoPath, 'onepay-logo', 'logo-onepay.svg', 'base64', 'image/svg+xml');
        $logoCid = 'cid:onepay-logo';
    }

    $fields = [
        'Nome' => $name,
        'E-mail' => $email,
        'Telefone' => $phone,
        'Estado' => $state,
        'Cidade' => $city,
        'Experiência no mercado de meios de pagamentos' => $experience,
        'Já possui carteira de clientes' => $customerBase,
        'Observações' => $message,
    ];

    $rows = '';
    foreach ($fields as $label => $value) {
        if ($value === '') {
            continue;
        }

        $rows .= sprintf(
            '<tr>'
            . '<th align="left" style="padding:12px 16px;background-color:#f9fbff;border-bottom:1px solid #e6eaf8;'
            . 'font-weight:600;color:#0f1a3f;width:32%%;vertical-align:top;">%s</th>'
            . '<td style="padding:12px 16px;border-bottom:1px solid #e6eaf8;color:#2a3146;">%s</td>'
            . '</tr>',
            htmlspecialchars($label, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
            nl2br(htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))
        );
    }

    if ($rows === '') {
        $rows = '<tr><td style="padding:16px;border-bottom:1px solid #e6eaf8;color:#2a3146;">'
            . 'Nenhum dado adicional informado.</td></tr>';
    }

    $logoBlock = $logoCid !== null
        ? '<img src="' . $logoCid . '" alt="OnePay" style="display:block;max-height:36px;">'
        : '<span style="display:block;font-weight:700;font-size:20px;color:#ffffff;">OnePay</span>';

    $mail->Body = sprintf(
        '<table width="100%%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f3f5fb" '
        . 'style="padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;">'
        . '<tr><td align="center" style="padding:32px 16px;">'
        . '<table width="100%%" cellpadding="0" cellspacing="0" border="0" '
        . 'style="max-width:640px;border-radius:16px;overflow:hidden;background-color:#ffffff;'
        . 'box-shadow:0 12px 32px rgba(15,26,63,0.08);">'
        . '<tr><td style="background:#0f1a3f;padding:20px 32px;" align="left">%s</td></tr>'
        . '<tr><td style="padding:32px;">'
        . '<h2 style="margin:0 0 16px;color:#0f1a3f;font-size:22px;">Nova solicitação de licenciados</h2>'
        . '<p style="margin:0 0 24px;color:#51608f;font-size:15px;line-height:1.5;">'
        . 'Um novo interessado preencheu o formulário da página Licenciados. Confira os detalhes abaixo:'
        . '</p>'
        . '<table width="100%%" cellpadding="0" cellspacing="0" border="0" '
        . 'style="border-collapse:collapse;font-size:15px;color:#101840;">%s</table>'
        . '</td></tr>'
        . '<tr><td style="background:#f7f8fc;padding:20px 32px;color:#5a6786;font-size:14px;">'
        . '<strong style="color:#0f1a3f;">Contato OnePay</strong><br>'
        . '<span style="display:block;margin-top:6px;">Site: '
        . '<a href="https://1pay.com.br" style="color:#0f6fff;text-decoration:none;">1pay.com.br</a></span>'
        . '<span style="display:block;margin-top:6px;">E-mails: '
        . '<a href="mailto:adm@1pay.com.br" style="color:#0f6fff;text-decoration:none;">adm@1pay.com.br</a></span>'
        . '</td></tr>'
        . '</table>'
        . '</td></tr>'
        . '</table>',
        $logoBlock,
        $rows
    );

    $mail->AltBody = "Nova solicitação via licenciados:\n\n" . implode(
        "\n",
        array_map(
            static fn($label, $value) => sprintf('%s: %s', $label, $value),
            array_keys($fields),
            array_values($fields)
        )
    ) . "\n\nContato OnePay\nSite: https://1pay.com.br\nE-mails: jdinix@gmail.com, adm@1pay.com.br";

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => 'Solicitação enviada com sucesso.',
    ]);
} catch (Exception $exception) {
    logSendMailError('Erro ao enviar e-mail', [
        'exception' => $exception->getMessage(),
        'code' => $exception->getCode(),
        'payload' => $payload,
    ]);
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Não foi possível enviar a mensagem.',
        'error' => $exception->getMessage(),
    ]);
}

