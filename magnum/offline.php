<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

    defined('_JEXEC') or die;

    // Отключили мета-тег generator Joomla
    $this->setGenerator(null);

    /** @var JDocumentHtml $this */

    $app = JFactory::getApplication();

    // Output as HTML5
    $this->setHtml5(true);

    $fullWidth = 1;

    // Add JavaScript Frameworks
    JHtml::_('bootstrap.framework');


    // Add html5 shiv
    JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

    // Load optional RTL Bootstrap CSS
    JHtml::_('bootstrap.loadCss', true, $this->direction);

    // Отключение лишних скриптов в шаблоне
	$document = JFactory::getDocument();
    unset($this->_scripts[$this->baseurl.'/media/jui/js/jquery-migrate.min.js']);
	unset($this->_scripts[$this->baseurl.'/media/jui/js/jquery-noconflict.js']);
	unset($this->_scripts[$this->baseurl.'/media/system/js/caption.js']);
	
    // Извлечение переменных из параметров шаблона
    $sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
    $logoFile = $this->params->get("logoFile");
    $backgroundFon = $this->params->get("backgroundFon");
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <jdoc:include type="head" />
    <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/offline.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="templates/<?php echo $this->template ?>/images/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="templates/<?php echo $this->template ?>/images/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180">
</head>
<body 123 id="<?php echo $backgroundFon ?>">
	<div class="outer">
		<div class="middle">
			<div class="inner well">
				<div class="header">
                    <img src="templates/<?php echo $this->template ?>/<?php echo $logoFile ?>" alt="Magnum news - Блог IT-шника" />
                    <h1><?php echo $sitename; ?></h1>
                    <?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) !== '') : ?>
					<p><?php echo $app->get('offline_message'); ?></p>
                    <?php elseif ($app->get('display_offline_message', 1) == 2) : ?>
					<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
                    <?php endif; ?>
				</div>
				<jdoc:include type="message" />
			</div>
		</div>
	</div>
</body>
</html>
