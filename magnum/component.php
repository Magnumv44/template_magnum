<?php
/**
 * @package     joomla.site
 * @subpackage  templates.magnum
 * @copyright   2005-2026 Vitalii Magnum
 * @license     MIT
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$jwa = $this->getWebAssetManager();

// Підключаємо лише базові стилі шаблону — без Bootstrap, jQuery, lightbox тощо
// В модальному вікні вони зайві і сповільнюють завантаження
$jwa->useStyle('template.styles');
$jwa->useStyle('template.bootstrap.style');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body class="contentpane">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
</body>
</html>