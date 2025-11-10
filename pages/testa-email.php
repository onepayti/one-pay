<?php
declare(strict_types=1);

/**
 * Script de teste simples para o endpoint includes/api/send-mail.php.
 * Ao carregar a página, dispara o POST simulando o formulário de licenciados.
 */

// Payload padrão – ajuste livremente ou passe valores via query string (?nome=...&email=...)
$defaultPayload = [
    'nome'       => 'Teste Licenciado OnePay',
    'email'      => 'licenciado-teste@example.com',
    'telefone'   => '(11) 99999-9999',
    'estado'     => 'SP',
    'cidade'     => 'Sao Paulo',
    'experiencia'=> 'sim',
    'carteira'   => 'nao',
    'mensagem'   => 'Solicitacao enviada automaticamente pelo script de teste.',
];

// Permite sobrescrever campos via GET (?email=... etc.)
$payload = $defaultPayload;
$overrides = array_intersect_key($_GET, $defaultPayload);
if (!empty($overrides)) {
    foreach ($overrides as $key => $value) {
        $payload[$key] = (string) $value;
    }
}

// Permite informar um endpoint manual (?endpoint=https://...)
// caso o site esteja servido em subdiretório/domínio diferente.
$endpoint = isset($_GET['endpoint']) ? trim((string) $_GET['endpoint']) : '';

if ($endpoint === '') {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $scheme = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $scriptDir = rtrim($scriptDir, '/');
    $basePath = preg_replace('#/pages$#', '', $scriptDir);
    if ($basePath === '/') {
        $basePath = '';
    }
    $endpoint = sprintf('%s://%s%s/includes/api/send-mail.php', $scheme, $host, $basePath);
}

$result = [
    'success'  => false,
    'status'   => null,
    'headers'  => [],
    'body'     => '',
    'json'     => null,
    'error'    => null,
    'endpoint' => $endpoint,
];

try {
    $ch = curl_init($endpoint);
    if ($ch === false) {
        throw new RuntimeException('Nao foi possivel inicializar a extensao cURL.');
    }

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($payload, '', '&', PHP_QUERY_RFC3986),
        CURLOPT_HEADER         => true,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER     => [
            'X-Requested-With: XMLHttpRequest',
        ],
    ]);

    $response = curl_exec($ch);
    if ($response === false) {
        $curlError = curl_error($ch);
        curl_close($ch);
        throw new RuntimeException('Erro ao executar cURL: ' . $curlError);
    }

    $status     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    curl_close($ch);

    $rawHeaders = substr($response, 0, $headerSize);
    $body       = substr($response, $headerSize);

    $parsedHeaders = [];
    foreach (explode("\r\n", trim($rawHeaders)) as $line) {
        if (strpos($line, ':') !== false) {
            [$name, $value] = explode(':', $line, 2);
            $parsedHeaders[trim($name)] = trim($value);
        }
    }

    $result['status']  = $status;
    $result['headers'] = $parsedHeaders;
    $result['body']    = $body;

    $decoded = json_decode($body, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $result['json']    = $decoded;
        $result['success'] = (bool) ($decoded['success'] ?? false);
    } else {
        $result['error'] = 'Resposta nao veio em JSON valido.';
    }
} catch (Throwable $exception) {
    $result['error'] = $exception->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Teste de envio de e-mail - Licenciados</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      color-scheme: light dark;
    }
    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      margin: 0;
      padding: clamp(2rem, 4vw, 4rem);
      background: #f5f7fb;
      color: #0f1a3f;
    }
    h1 { font-size: clamp(2rem, 3vw, 2.6rem); margin-bottom: 1.5rem; }
    .card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 45px rgba(15, 26, 63, 0.08);
      padding: clamp(2rem, 4vw, 3rem);
      max-width: 960px;
      margin: 0 auto;
      display: grid;
      gap: 1.6rem;
    }
    pre {
      background: #0f1a3f;
      color: #ffffff;
      padding: 1.2rem;
      border-radius: 12px;
      overflow-x: auto;
      font-size: 0.95rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.95rem;
    }
    th, td {
      padding: 0.6rem 0.8rem;
      border-bottom: 1px solid #e3e8f4;
      text-align: left;
    }
    th { width: 28%; font-weight: 600; color: #12263e; }
    .status {
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      font-weight: 600;
      padding: 0.4rem 0.9rem;
      border-radius: 999px;
      background: rgba(15, 111, 255, 0.12);
      color: #0f6fff;
    }
    .status--error {
      background: rgba(255, 77, 107, 0.14);
      color: #c01c3f;
    }
    .status--success {
      background: rgba(46, 213, 115, 0.18);
      color: #188754;
    }
    .note {
      font-size: 0.85rem;
      color: rgba(15, 26, 63, 0.7);
      margin-top: 0.8rem;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Teste da API de e-mail (Licenciados)</h1>

    <div>
      <?php
      $statusClass = $result['success'] ? 'status status--success' : 'status status--error';
      $statusText  = $result['success'] ? 'Envio concluido' : 'Envio falhou';
      ?>
      <span class="<?php echo $statusClass; ?>">
        <?php echo htmlspecialchars($statusText, ENT_QUOTES, 'UTF-8'); ?>
        <?php if ($result['status'] !== null): ?>
          <small>Status HTTP: <?php echo (int) $result['status']; ?></small>
        <?php endif; ?>
      </span>
      <div class="note">
        Endpoint utilizado:
        <code><?php echo htmlspecialchars($result['endpoint'], ENT_QUOTES, 'UTF-8'); ?></code>
      </div>
    </div>

    <section>
      <h2>Payload enviado</h2>
      <table>
        <tbody>
        <?php foreach ($payload as $label => $value): ?>
          <tr>
            <th><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></th>
            <td><?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <p class="note">
        Modifique valores via query string, por exemplo:
        <code>?email=meuemail@dominio.com&nome=Fulano</code>.
      </p>
    </section>

    <section>
      <h2>Resposta</h2>
      <?php if ($result['json'] !== null): ?>
        <pre><?php echo htmlspecialchars(json_encode($result['json'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8'); ?></pre>
      <?php else: ?>
        <pre><?php echo htmlspecialchars($result['body'], ENT_QUOTES, 'UTF-8'); ?></pre>
      <?php endif; ?>

      <?php if ($result['error'] !== null): ?>
        <div class="note">Observacao: <?php echo htmlspecialchars($result['error'], ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>
    </section>
  </div>
</body>
</html>
