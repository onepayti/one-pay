<?php
declare(strict_types=1);

$markdownFile = __DIR__ . '/politicas-de-cookies.md';
$rawMarkdown = is_readable($markdownFile) ? file_get_contents($markdownFile) : '';

/**
 * Converte sintaxe simples de Markdown para HTML.
 */
function convert_markdown_to_html(string $markdown): string
{
    $markdown = preg_replace("/\r\n?/", "\n", $markdown);
    $lines = explode("\n", $markdown);
    $html = [];
    $paragraphBuffer = [];
    $inList = false;

    $flushParagraph = static function () use (&$paragraphBuffer, &$html): void {
        if (empty($paragraphBuffer)) {
            return;
        }
        $paragraph = implode(' ', $paragraphBuffer);
        $html[] = '<p>' . convert_inline_markdown($paragraph) . '</p>';
        $paragraphBuffer = [];
    };

    $flushList = static function () use (&$inList, &$html): void {
        if ($inList) {
            $html[] = '</ul>';
            $inList = false;
        }
    };

    foreach ($lines as $line) {
        $trimmed = trim($line);

        if ($trimmed === '') {
            $flushParagraph();
            $flushList();
            continue;
        }

        if (preg_match('/^#{1,6}\s+(.+)/', $trimmed, $matches)) {
            $flushParagraph();
            $flushList();

            $level = strlen(strtok($trimmed, ' '));
            $level = max(1, min(6, $level));
            $content = trim(substr($trimmed, $level + 1));
            $html[] = sprintf('<h%d>%s</h%d>', $level, convert_inline_markdown($content), $level);
            continue;
        }

        if (preg_match('/^[-*]\s+(.+)/', $trimmed, $matches)) {
            $flushParagraph();
            if (!$inList) {
                $html[] = '<ul>';
                $inList = true;
            }

            $html[] = '<li>' . convert_inline_markdown($matches[1]) . '</li>';
            continue;
        }

        if (preg_match('/^>\s*(.+)/', $trimmed, $matches)) {
            $flushParagraph();
            $flushList();

            $html[] = '<blockquote>' . convert_inline_markdown($matches[1]) . '</blockquote>';
            continue;
        }

        $paragraphBuffer[] = $trimmed;
    }

    $flushParagraph();
    if ($inList) {
        $html[] = '</ul>';
    }

    return implode("\n", $html);
}

/**
 * Trata marcações inline básicas.
 */
function convert_inline_markdown(string $text): string
{
    $escaped = htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    $escaped = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $escaped);
    $escaped = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $escaped);
    $escaped = preg_replace('/`(.+?)`/', '<code>$1</code>', $escaped);

    $escaped = preg_replace_callback(
        '/\[(.*?)\]\((https?:\/\/[^\s)]+)\)/',
        static fn ($matches) => sprintf(
            '<a href="%s" target="_blank" rel="noopener noreferrer">%s</a>',
            $matches[2],
            $matches[1]
        ),
        $escaped
    );

    return $escaped;
}

$renderedHtml = $rawMarkdown !== '' ? convert_markdown_to_html($rawMarkdown) : '<p>Conteúdo não disponível no momento.</p>';
?>

<main class="legal-page legal-page--cookies">
  <section class="legal-page__hero">
    <div class="container legal-page__container">
      <article class="markdown-body">
        <?php echo $renderedHtml; ?>
      </article>
    </div>
  </section>
</main>
