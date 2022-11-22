<?php
/**
 * Данный шаблон был разработан для сайта https://www.magnumblog.space
 * При копировнии данного шаблона в обязательном порядке уведомите администрацию сайта https://www.magnumblog.space
 * И пропишите копирайты разработчика:
 * Developed by Magnum https://www.magnumblog.space
 */
    // Запрет на прямое обращение к файлам
    defined('_JEXEC') or die;

    use Joomla\CMS\Factory;
    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Language\Text;
    use Joomla\CMS\Uri\Uri;

    /** @var Joomla\CMS\Document\HtmlDocument $this */

    $wa  = $this->getWebAssetManager();

    // Отключили мета-тег generator Joomla
    $wa  = $this->setGenerator(null);

    // Извлечение переменных из параметров шаблона
    $analytics = $this->params->get("analytics");
    $backgroundFon = $this->params->get("backgroundFon");
    $logoFile = $this->params->get("logoFile");
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#434343">
    <meta name="yandex-verification" content="078ecede026c3de9" />
    <meta name="google-site-verification" content="3EutjLuhAK4xbS7NQzrUoQ6oYs5eTv3nWno9ZiEEdOU" />
    <meta name="wot-verification" content="0da95e472682f0116875"/>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <!--[if lt IE 9]> 
    <script src="template/<?php echo $this->template ?>/js/html5shiv.min.js"></script>
    <![endif]-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
    <?php echo $analytics ?>
    <link href="templates/<?php echo $this->template ?>/images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
</head>
<body id="<?php echo $backgroundFon ?>">
    <div class="container">
        <!-- Начало шапки сайта -->
        <header>
            <div class="row justify-content-center d-none d-lg-block">
                <div class="col-12 logo">
                    <a href="/" title="Magnum news - Блог IT-шника">
                        <img src="templates/<?php echo $this->template ?>/<?php echo $logoFile ?>" alt="Magnum news - Блог IT-шника" width="175" height="270" />
                        <span class="logo-name">Magnum news</span><br />
                        <span class="logo-slogan">Блог <span style="color: red;">IT</span>-шника</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="col-12 top-menu">
                <?php if ($this->countModules('top-menu')) : ?>
                    <div class="align-menu">
                    <jdoc:include type="modules" name="top-menu" style="none" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <main>
            <div class="row justify-content-center content">
                <div class="col-3 left">
                    <jdoc:include type="modules" name="left" style="html5" />
                </div>
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
                        <a title="Нажмите что-бы открыть пользовательское соглашение" href="<?php echo $this->baseurl ?>disclaimers" target="_blank">Disclaimers</a>
                    </div>
                </div>
            </div>
        </div>
        </footer>
    </div>
    <!-- Скрипты lightbox, вставки примеров кода в контент, кнопки вверх -->
    <jdoc:include type="scripts" />
    <script async src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-3.6.0.min.js"></script>
    <script async src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/lightbox.js"></script>
    <script async src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/prism.js"></script>
    <script async src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/go_top.js"></script>
</body>
</html>
