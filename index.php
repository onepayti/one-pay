<?php

// Inicializa as variáveis de SEO com valores padrão
$telefone = "11965759045";
$telefone_humano = "(11) 96575-9045";
$linkWhatsapp = 'https://wa.me/55' . $telefone . '?text=Olá, quero começar com a OnePay';
$pageTitle = "OnePay | Soluções em Infraestrutura Financeira para Empresas";
$pageTitleSuffix = " | OnePay";
$pageDescription = "A OnePay oferece soluções completas em infraestrutura financeira para empresas, com serviços de pagamento, conta digital e gestão financeira integrada.";
$pageKeywords = "infraestrutura financeira, pagamentos, conta digital empresarial, gestão financeira, soluções financeiras, fintech, meios de pagamento";

// Variáveis para Open Graph e Schema.org (padrão)
$canonical = "https://1pay.com.br/"; // URL padrão
$ogLocale = "pt_BR";
$ogType = "website";
$ogTitle = $pageTitle; // Usa o título da página por padrão
$ogSiteName = "OnePay";
$ogImage = "https://www.1pay.com.br/assets/images/opengraph-onepay.png";
$ogImageWidth = "512";
$ogImageHeight = "512";
$ogImageType = "image/png";

// Captura a URI da solicitação
$request = $_SERVER['REQUEST_URI'];

/* $prefix = '/projetos/onepay'; // Prefixo do caminho da aplicação - Disabled for Docker
if (substr($request, 0, strlen($prefix)) == $prefix) {
    $request = substr($request, strlen($prefix));
} */

// Remove possíveis parâmetros da URL e normaliza as rotas
$request = explode('?', $request)[0]; // Remove query string
$request = rtrim($request, '/'); // Remove barra final
$request = strtolower($request); // Torna a URL minúscula

// Define as rotas disponíveis
switch ($request) {
    case '':
    case '/':
    case '/index.php':
    case '/index.html':
        $pageFile = 'pages/home.php';
        $ctaHref = $linkWhatsapp;
        break;

    case '/lojistas':
        $pageTitle = "Lojistas " . $pageTitleSuffix;
        $pageDescription = "A OnePay oferece soluções completas para lojistas, incluindo pagamentos, conta digital e gestão financeira integrada para otimizar suas operações comerciais.";
        $pageKeywords = "soluções para lojistas, pagamentos para lojistas, conta digital lojista, gestão financeira comercial, meios de pagamento varejo";
        $canonical = "https://1pay.com.br/lojistas/";
        $pageFile = 'pages/lojistas.php';
        $ctaHref = $linkWhatsapp;
        $ogImage = "https://www.1ay.com.br/images/opengraph-onepay-lojistas.png";
        break;

    case '/licenciados':
        $pageTitle = "Licenciados " . $pageTitleSuffix;
        $pageDescription = "Para representantes comerciais das nossas maquininhas: condições comerciais, comissionamento, suporte, treinamento e integração com a plataforma OnePay.";
        $pageKeywords = "representantes comerciais, maquininhas, terminais de pagamento, parceria comercial, comissionamento, suporte, treinamento";
        $canonical = "https://1pay.com.br/licenciados/";
        $ogImage = "https://www.1ay.com.br/images/opengraph-onepay-licenciados.png";
        $pageFile = 'pages/licenciados.php';
        $ctaHref = '#contato';
        break;

    //POLITICAS E TERMOS
    case '/politicas-de-privacidade':
        $pageTitle = "Políticas e Termos " . $pageTitleSuffix;
        $pageDescription = "Conheça nossas políticas de privacidade, termos de uso e condições gerais dos serviços financeiros oferecidos pela OnePay para empresas e lojistas.";
        $pageKeywords = "políticas de privacidade, termos de uso, condições gerais, serviços financeiros, regulamentação, lgpd, compliance";
        $canonical = "https://1pay.com.br/politicas-e-termos/";
        $pageFile = 'pages/politicas-de-privacidade.php';
        $ctaHref = $linkWhatsapp;
        break;

    //POLITICAS E TERMOS
    case '/testa-email':
        $pageTitle = "Testa Email " . $pageTitleSuffix;
        $pageDescription = "Conheça nossas políticas de privacidade, termos de uso e condições gerais dos serviços financeiros oferecidos pela OnePay para empresas e lojistas.";
        $pageKeywords = "políticas de privacidade, termos de uso, condições gerais, serviços financeiros, regulamentação, lgpd, compliance";
        $canonical = "https://1pay.com.br/politicas-e-termos/";
        $pageFile = 'pages/testa-email.php';
        break;

    //POLITICAS E TERMOS
    case '/termos-de-uso':
        $pageTitle = "Termos de Uso " . $pageTitleSuffix;
        $pageDescription = "Conheça nossas políticas de privacidade, termos de uso e condições gerais dos serviços financeiros oferecidos pela OnePay para empresas e lojistas.";
        $pageKeywords = "políticas de privacidade, termos de uso, condições gerais, serviços financeiros, regulamentação, lgpd, compliance";
        $canonical = "https://1pay.com.br/termos-de-uso/";
        $pageFile = 'pages/termos-de-uso.php';
        break;

    //ERR0 404
    default:
        $pageTitle = "OPS! Página não encontrada... ERRO 404" . $pageTitleSuffix;
        $pageDescription = "A OnePay não encontrou a página solicitada. Verifique o endereço ou volte à página inicial para continuar navegando pelos nossos serviços de pagamentos, conta digital e soluções financeiras.";
        $pageKeywords = "erro 404, página não encontrada, OnePay, suporte, ajuda";
        $canonical = "https://1pay.com.br/erro-404/";
        $pageFile = 'pages/404.php'; // Página 404 se a rota não for encontrada
        $ctaHref = $linkWhatsapp;
        break;
}

// Inclui o cabeçalho
include 'includes/header.php';

// Inclui o conteúdo da página
include $pageFile;

// Inclui o rodapé
include 'includes/footer.php';

?>