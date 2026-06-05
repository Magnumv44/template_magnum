<?php
/**
 * @package     joomla.site
 * @subpackage  templates.magnum
 * @copyright 2005-2026 Magnum
 * @license MIT; see LICENSE https://github.com/Magnumv44/template_magnum/blob/main/LICENSE
 * 
 * Даний шаблон був розроблений сепціально для сайту https://www.magnumblog.space
 * При копіюванні даного шаблона, обо'язково сповістіть адміністратора сайту https://www.magnumblog.space
 * Та вкажіть в видимій частині копірайт:
 * Developed by Magnum https://www.magnumblog.space
 */
    // Заборона на пряме звернення до файлів
    defined('_JEXEC') or die;

    use Joomla\CMS\Language\Text;

    /** @var Joomla\CMS\Document\HtmlDocument $this */

    // Прибираємо тег generator Joomla
    $this->setGenerator(null);

    // Отримуємо Web Asset Manager
    $jwa = $this->getWebAssetManager();

    // Підключаємо ресурси з joomla.asset.json
    $jwa->useStyle('template.bootstrap.style');
    $jwa->useStyle('template.bootstrap.icons');
    $jwa->useStyle('template.styles');
    $jwa->useScript('template.bootstrap.script');
    $jwa->useScript('template.jquery');
    $jwa->useScript('template.lightbox');
    $jwa->useScript('template.prism');
    $jwa->useScript('template.go_top');

    // Отримуємо змінні з параметрів шаблону
    $verificationCodes = $this->params->get('verification_codes', null);
    $analyticsId       = $this->params->get('analytics_id');
    $analyticsCustom   = $this->params->get('analytics_custom');
    $backgroundFon     = $this->params->get('backgroundFon');
    $logoFile          = $this->params->get('logoFile');
    $themeColor        = $this->params->get('themeColor',   '#434343');
    $colorPrimary      = $this->params->get('colorPrimary', '#434343');
    $colorAccent       = $this->params->get('colorAccent',  '#ffad29');
    $colorLink         = $this->params->get('colorLink',    '#0080c0');

    // Валідація кольорів — лише hex формат
    $validateColor = function(string $color, string $default): string {
        return preg_match('/^#[0-9A-Fa-f]{6}$/', $color) ? $color : $default;
    };

    $themeColor   = $validateColor($themeColor,   '#434343');
    $colorPrimary = $validateColor($colorPrimary, '#434343');
    $colorAccent  = $validateColor($colorAccent,  '#ffad29');
    $colorLink    = $validateColor($colorLink,    '#0080c0');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?php echo $themeColor; ?>">
    <jdoc:include type="metas" />
    <?php foreach ((array) $verificationCodes as $item) :
            if (!empty($item->service) && !empty($item->code)) :
    ?>
    <meta name="<?php echo htmlspecialchars($item->service, ENT_QUOTES, 'UTF-8'); ?>" content="<?php echo htmlspecialchars($item->code, ENT_QUOTES, 'UTF-8'); ?>" />
    <?php
            endif;
        endforeach;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    </noscript>
    <jdoc:include type="styles" />
    <style>
        :root {
            --color-primary: <?php echo $colorPrimary; ?>;
            --color-accent:  <?php echo $colorAccent; ?>;
            --color-link:    <?php echo $colorLink; ?>;
        }
    </style>
    <?php if ($analyticsId && preg_match('/^(G-[A-Z0-9]+|UA-\d+-\d+)$/', $analyticsId)) :?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($analyticsId); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo htmlspecialchars($analyticsId); ?>');
    </script>
    <?php elseif ($analyticsCustom) :
        echo $analyticsCustom;
    endif; ?>
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="media/templates/site/<?php echo $this->template ?>/images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
</head>
<body id="<?php echo htmlspecialchars($backgroundFon, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="container">
        <!-- Початок шапки сайту -->
        <header>
            <div class="row justify-content-center d-none d-lg-block">
                <div class="col-12 logo">
                    <a href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars(Text::_('TPL_MAGNUM_SITE_NAME_FULL'), ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="<?php echo htmlspecialchars($this->baseurl . '/media/templates/site/' . $this->template . '/' . $logoFile, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars(Text::_('TPL_MAGNUM_SITE_NAME_FULL'), ENT_QUOTES, 'UTF-8'); ?>" width="175" height="270" />
                        <span class="logo-name"><?php echo Text::_('TPL_MAGNUM_SITE_NAME_SHORT'); ?></span><br />
                        <span class="logo-slogan"><?php echo Text::_('TPL_MAGNUM_SLOGAN'); ?></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Початок меню сайту -->
        <aside>
            <div class="row">
                <div class="col-12 top-menu">
                    <?php if ($this->countModules('top-menu')) : ?>
                        <div class="align-menu">
                            <jdoc:include type="modules" name="top-menu" style="none" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </aside>
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
                    <div>Developed by: <a href="https://www.magnumblog.space" title="Developed by Magnum">Magnum</a>
                    &copy; 2005 - <?php echo date('Y'); ?>
                    </div>
                    <div class="disclaimers">
                        <a title="Натисніть щоб відкрити користувальницьку угоду." href="<?php echo htmlspecialchars($this->baseurl . '/disclaimers', ENT_QUOTES, 'UTF-8'); ?>" target="_blank">Disclaimers</a>
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
