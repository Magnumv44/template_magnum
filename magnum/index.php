<?php
/**
 * @package     joomla.site
 * @subpackage  templates.magnum
 * @copyright 2005-2025 Magnum
 * @license MIT; see LICENSE https://github.com/Magnumv44/template_magnum/blob/main/LICENSE
 * 
 * Даний шаблон був розроблений сепціально для сайту https://www.magnumblog.space
 * При копіюванні даного шаблона, обо'язково сповістіть адміністратора сайту https://www.magnumblog.space
 * Та вкажіть в видимій частині копірайт:
 * Developed by Magnum https://www.magnumblog.space
 */
    // Заборона на пряме звернення до файлів
    defined('_JEXEC') or die;

    use Joomla\CMS\Factory;
    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Language\Text;
    use Joomla\CMS\Uri\Uri;

    /** @var Joomla\CMS\Document\HtmlDocument $this */

    // Прибираємо тег generator Joomla
    $wa  = $this->setGenerator(null);

    // Отримуємо Web Asset Manager
    $jwa  = $this->getWebAssetManager();

    // Підключаємо ресурси з joomla.asset.json
    $jwa->useStyle('template.bootstrap.style');
    $jwa->useStyle('template.styles');
    $jwa->useScript('template.bootstrap.script');
    $jwa->useScript('template.jquery');
    $jwa->useScript('template.lightbox');
    $jwa->useScript('template.prism');
    $jwa->useScript('template.go_top');

    // Отримуєм змінні ж параметрів шаблону
    $analytics = $this->params->get("analytics");
    $backgroundFon = $this->params->get("backgroundFon");
    $logoFile = $this->params->get("logoFile");
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--TODO: спробувати перевести коди в параметри шаблону-->
    <meta name="theme-color" content="#434343">
    <meta name="yandex-verification" content="078ecede026c3de9" />
    <meta name="google-site-verification" content="3EutjLuhAK4xbS7NQzrUoQ6oYs5eTv3nWno9ZiEEdOU" />
    <meta name="wot-verification" content="0da95e472682f0116875"/>
    <jdoc:include type="metas" />
    <!--[if lt IE 9]> 
    <script src="media/templates/site/<?php echo $this->template ?>/js/html5shiv.min.js"></script>
    <![endif]-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    </noscript>
    <jdoc:include type="styles" />
    <?php echo $analytics ?>
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
</head>
<body id="<?php echo $backgroundFon ?>">
    <div class="container">
        <!-- Початок шапки сайту -->
        <header>
            <div class="row justify-content-center d-none d-lg-block">
                <div class="col-12 logo">
                    <a href="/" title="Magnum news - Блог IT-шника">
                        <img src="media/templates/site/<?php echo $this->template ?>/<?php echo $logoFile ?>" alt="Magnum news - Блог IT-шника" width="175" height="270" />
                        <span class="logo-name"><?php echo Text::_('TPL_MAGNUM_SITE_NAME_SHORT'); ?></span><br />
                        <span class="logo-slogan">Блог <span style="color: red;">IT</span>-шника</span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Початок меню сайту -->
        <div class="row">
            <div class="col-12 top-menu">
                <?php if ($this->countModules('top-menu')) : ?>
                    <div class="align-menu">
                    <jdoc:include type="modules" name="top-menu" style="none" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Початок контенту сайту -->
        <main>
            <div class="row justify-content-center content">
                <!-- Лівий блок -->
                <div class="col-3 left">
                    <jdoc:include type="modules" name="left" style="html5" />
                </div>
                <!-- Центральний блок -->
                <div class="col-9 con">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
            </div>
        </main>
        <footer>
        <div class="row justify-content-center">
            <div class="col-12 footer">
                <div class="developed">
                    <div>Developed by: <a href="http://www.magnumblog.space" title="Developed by Magnum">Magnum</a>
                    &copy; 2005 - <?php echo date('Y'); ?>
                    </div>
                    <div class="disclaimers">
                        <a title="Натисніть щоб відкрити користувальницьку угоду." href="<?php echo $this->baseurl ?>disclaimers" target="_blank">Disclaimers</a>
                    </div>
                </div>
            </div>
        </div>
        </footer>
    </div>
    <!-- Скрипти lightbox, prism, jquery, bootstrap, кнопки вгору -->
    <jdoc:include type="scripts" />
</body>
</html>
