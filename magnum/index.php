<?php
/**
 * Данный шаблон был разработан для сайта https://www.magnumblog.space
 * При копировнии данного шаблона в обязательном порядке уведомите адмнистрацию сайта https://www.magnumblog.space
 * И пропишите копирайты разработчика:
 * Developed by Magnum https://www.magnumblog.space
 */
    // Запрет на прямое обращение к файлам
    defined('_JEXEC') or die;

    // Отключили мета-тег generator Joomla
    $this->setGenerator(null);

    //подключение bootstrap css
    JHtml::_('bootstrap.framework');
    JHtmlBootstrap::loadCss(true);

    // Отключение лишних скриптов в шаблоне
    $document = JFactory::getDocument();
    unset($this->_scripts[$this->baseurl.'/media/jui/js/jquery-migrate.min.js']);
    unset($this->_scripts[$this->baseurl.'/media/jui/js/jquery-noconflict.js']);
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#434343">
    <meta name="yandex-verification" content="078ecede026c3de9" />
    <meta name="google-site-verification" content="3EutjLuhAK4xbS7NQzrUoQ6oYs5eTv3nWno9ZiEEdOU" />
    <meta name="wot-verification" content="0da95e472682f0116875"/>
    <jdoc:include type="head" />
    <!--[if lt IE 9]> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script> 
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
    <link href="templates/<?php echo $this->template ?>/images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1697908-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-1697908-1');
    </script>
  </head>
  <body>
      <!-- Начало шапки сайта -->
      <header>
        <div class="container-fluid visible-desktop">
          <div class="row-fluid">
            <div class="span10 logo">
              <a href="/" title="Magnum news - Блог IT-шника">
                <img id="logo" src="templates/<?php echo $this->template ?>/images/logo.png" alt="Magnum news - Блог IT-шника" />
                <span class="logo-name">Magnum news</span><br />
                <span class="logo-slogan">Блог <span style="color: red;">IT</span>-шника</span>
              </a>
            </div>
          </div>
        </div>
      </header>
      <div class="container-fluid">
        <div class="row-fluid">
          <!-- Начало горизонтального меню -->
          <div class="span10 top-menu">
            <div class="navbar navbar-inner">
              <a class="brand hidden-desktop" href="/">
                <img id="smal-logo" src="templates/<?php echo $this->template ?>/images/small-logo.png" alt="Magnum news - Блог IT-шника" />
                Magnum news
              </a> <!-- На компьютерах не будет отображатся -->
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-align-justify icon-white"></span>
              </a>
              <div class="nav-collapse">
                <jdoc:include type="modules" name="top-menu" style="menu" />
              </div>
            </div>
          </div>
          <!-- Начало вывода контента -->
          <div class="span10 content">
            <div class="row-fluid">
              <div class="span2 left">
                <jdoc:include type="modules" name="left" style="html5" />
              </div>
              <div class="span8 con">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
              </div>
            </div>
        </div>
      </div>
      <!-- Начало футера -->
      <footer>
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span10 footer">
            <div class="developed">
              <div>Developed by: <a href="http://www.magnumblog.space" title="Developed by Magnum">Magnum</a>
                  &copy; 2005 - <?php echo date('Y'); ?>
              </div>
              <div class="disclaimers">
                <a title="Нажмите что-бы открыть пользовательское соглашение" href="<?php echo $this->baseurl ?>terms-of-use/121-disclaimers" target="_blank">Disclaimers</a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </footer>
    <!-- Скрипты кнопоки lightbox, для вставок кода в контент, кнопки вверх -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/lightbox.js" type="text/javascript"></script>
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/prism.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/go_top.js" type="text/javascript"></script>
  </body>
</html>
