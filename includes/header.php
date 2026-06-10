<?php include 'functions.php';
disclaimer();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#143554">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="apple" href="images/favicon.png" />

    <title><?php echo $pageTitle; ?></title>
    <link rel="canonical" href="<?php echo $canonical; ?>" />

    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="keywords" content="<?php echo $pageKeywords; ?>">
    <meta name="author" content="Agência ZZIP">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="<?php echo $ogLocale; ?>" />
    <meta property="og:type" content="<?php echo $ogType; ?>" />
    <meta property="og:title" content="<?php echo $pageTitle; ?>" />
    <meta property="og:description" content="<?php echo $pageDescription; ?>" />
    <meta property="og:url" content="<?php echo $canonical; ?>" />
    <meta property="og:site_name" content="<?php echo $ogSiteName; ?>" />
    <meta property="og:image" content="<?php echo $ogImage; ?>" />
    <meta property="og:image:width" content="<?php echo $ogImageWidth; ?>" />
    <meta property="og:image:height" content="<?php echo $ogImageHeight; ?>" />
    <meta property="og:image:type" content="<?php echo $ogImageType; ?>" />

    <!-- Schema.org JSON-LD -->
    <?php include __DIR__ . '/schema.php'; ?>
    <link rel="stylesheet" href="style.css?v=<?php echo get_asset_version('style-atual.css'); ?>" />

    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

    <!-- Meta Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1241497181154167');
      fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1241497181154167&ev=PageView&noscript=1"
      /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body>

    <header class="cabecalho">
        <div class="cabecalho__container">
            <a href="" class="logo">
                <img src="images/logo-branca-onepay.svg" alt="OnePay" />
            </a>

            <nav class="navegacao">
                <a href="lojistas" class="nav__link">Para Lojistas</a>
                <a href="licenciados" class="nav__link">Para Licenciados</a>
                <a href="<?php echo $ctaHref; ?>" class="nav__link cta">Comece agora!</a>
            </nav>

            <!-- Botão de menu mobile -->
            <button class="menu__toggle" aria-label="Abrir menu">
                <img src="images/toggle.svg">
            </button>
        </div>

        <!-- Menu mobile (overlay) -->
        <div class="menu__overlay">
            <div class="menu__overlay-header">
                <img src="images/logo-azul-onepay.svg" alt="OnePay" class="logo__overlay" />
                <button class="menu__close" aria-label="Fechar menu">✕</button>
            </div>

            <nav class="menu__overlay-nav">
                <a href="lojistas" class="overlay__link">Para Lojistas</a>
                <a href="licenciados" class="overlay__link">Para Licenciados</a>
                <div><a href="<?php echo $ctaHref; ?>" class="cta cta--dark">Quero começar agora!</a></div>
            </nav>

            <!-- Menu mobile (overlay) Sociais -->
            <div class="menu__overlay-social">
                <p class="social__title">Acompanhe nas redes:</p>
                <ul class="social__list">
                    <li><a href="https://www.facebook.com/profile.php?id=61578161810964"
                            title="Siga-nos no Facebook da OnePay"><img src="images/facebook.svg" alt="Facebook" /></a>
                    </li>
                    <li><a href="https://www.instagram.com/onepayoficial" title="Siga-nos no Instagram da OnePay"><img
                                src="images/instagram.svg" alt="Instagram" /></a></li>
                    <li><a href="https://www.linkedin.com/company/onepayoficial/"
                            title="Siga-nos no Linkedin da OnePay"><img src="images/linkedin.svg" alt="Linkedin" /></a>
                    </li>
                </ul>
            </div>
    </header>