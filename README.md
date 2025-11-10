# OnePay

## Visão geral
Landing page institucional da OnePay, escrita em PHP puro, com roteamento simples via `index.php`. O conteúdo de páginas legais (políticas, termos, regras de uso) é mantido em Markdown e renderizado em tempo real, permitindo revisões sem alterar o layout. O projeto acompanha um ambiente Docker para desenvolvimento e depende do Composer para gerenciar bibliotecas PHP.

## Stack e dependências
- **PHP 8.2+ com Apache** – o container já habilita `mod_rewrite`, `mod_headers`, `mod_deflate` e `mod_expires`, necessários para que o `.htaccess` funcione por completo.
- **Composer 2.x** – instala o único pacote PHP utilizado atualmente.
- **Bibliotecas PHP**: [`phpmailer/phpmailer` ^6.10] para envio de e-mails transacionais (carregado em `vendor/` após `composer install`).
- **Extensões do PHP**: `zip` (instalada no Dockerfile); ao rodar fora do container, habilite a mesma extensão.

## Como rodar localmente
### Com Docker
1. `docker compose up --build -d` – sobe o Apache na porta `8085` apontando para `/var/www/html`.
2. Acesse `http://localhost:8085` para navegar.
3. Arquivos são montados via volume, então toda alteração em `pages/`, `includes/`, CSS ou imagens reflete imediatamente.

### Sem Docker
1. Instale as extensões mencionadas e habilite `AllowOverride All` no VirtualHost para que o `.htaccess` seja interpretado.
2. Rode `composer install --no-dev` na raiz do projeto para baixar o PHPMailer.
3. Configure um host virtual apontando para o diretório do projeto ou utilize `php -S 0.0.0.0:8080 -t .` (neste caso o `.htaccess` não terá efeito; prefira Apache ou um servidor que interprete regras de rewrite).

## Estrutura principal
- `index.php` – roteador que define SEO/meta tags e carrega os arquivos em `pages/`.
- `includes/` – cabeçalho, rodapé, schemas e helpers (`functions.php` contém utilidades como o busting de cache via `get_asset_version()`).
- `pages/` – componentes de conteúdo. Os arquivos `.php` podem renderizar HTML diretamente ou converter Markdown (`*.md`) em HTML.
- `style-atual.css` – folha de estilos principal (o versionamento no HTML é calculado em `functions.php`).
- `images/`, `fonts/`, `outros/` – ativos estáticos.
- `.htaccess` – garante roteamento amigável, headers de segurança, redirects e políticas de cache.

## Regras do `.htaccess` (obrigatórias)
O projeto depende das diretivas abaixo para que o roteamento e os headers funcionem corretamente:
- `RewriteEngine On` + fallback para `index.php` – todas as rotas inexistentes são tratadas pelo roteador PHP. Sem isso, páginas como `/termos-de-uso` não carregam.
- Normalização de trailing slash – evita conteúdo duplicado em SEO.
- `Header set` (X-Content-Type-Options, X-Frame-Options, X-XSS-Protection) – aplica camadas mínimas de segurança. O módulo `mod_headers` precisa estar ativo.
- Redirect 301 para slugs antigos (`/suporte`, `/checkout`, `/cobranca`).
- Compressão gzip (`mod_deflate`) e políticas de cache (`mod_expires` + `FilesMatch` para CSS/JS). Em produção, ajuste o bloco de cache removendo os comentários conforme a estratégia desejada.
- Mantenha `AllowOverride All` (já configurado no Dockerfile) ou replique manualmente as diretivas em um VirtualHost caso prefira desativar `.htaccess`.

## Páginas legais, regras de uso e futuras páginas
Os templates `pages/politicas-de-privacidade.php` e `pages/termos-de-uso.php` convertem um Markdown em HTML responsivo. O fluxo recomendado para criar ou alterar conteúdos legais é:
1. **Editar o conteúdo** – ajuste o arquivo `.md` correspondente. Ex.: `pages/politicas-de-privacidade.md` ou `pages/politicas-de-cookies.md`. Se preferir separar termos diferentes, crie um novo Markdown (ex.: `pages/regras-de-uso.md`).
2. **Reapontar o template** – no arquivo `.php` responsável (`pages/termos-de-uso.php`, `pages/politicas-de-privacidade.php`, etc.), altere a linha `$markdownFile = __DIR__ . '/arquivo.md';` para usar o novo documento.
3. **Registrar a rota** – em `index.php`, adicione um novo `case '/nova-rota':` definindo:
   - `$pageTitle`, `$pageDescription`, `$pageKeywords`, `$canonical` e, opcionalmente, variáveis de OpenGraph.
   - `$pageFile` apontando para o novo template ou página.
   - `$ctaHref` caso o CTA padrão da navegação precise mudar.
4. **Atualizar links** – inclua o slug no menu (em `includes/header.php`), rodapé (`includes/footer.php`) ou em qualquer CTA relevante para que os usuários localizem a página.
5. **Novas páginas puramente estáticas** – basta adicionar um `.php` dentro de `pages/`, escrever o HTML desejado e registrar o slug no switch de `index.php`. Se quiser manter o conteúdo em Markdown, reutilize o conversor existente copiando o padrão das páginas legais.

## Deploy / publicação
- Gere o build de produção executando `composer install --no-dev --optimize-autoloader` e limpe arquivos não utilizados (pastas de fontes editáveis, `.zip` de backup, etc., se não forem necessários em produção).
- Garanta que o servidor Apache de destino tenha os mesmos módulos e permissões configurados no Dockerfile (`AllowOverride All`, proprietário `www-data`, permissão 755).
- O `robots.txt` e o `sitemap.xml` já estão versionados; atualize-os quando novos slugs forem criados para manter os mecanismos de busca sincronizados.

Com isso, qualquer nova “regra de uso” ou página institucional pode ser criada de forma previsível, preservando SEO, navegação e o comportamento das regras do `.htaccess`.
