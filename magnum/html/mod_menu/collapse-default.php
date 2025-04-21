<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

//HTMLHelper::_('bootstrap.collapse');
?>

<nav class="navbar navbar-expand-lg" aria-label="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>">
<div class="container-fluid">
    <a class="navbar-brand d-lg-none" href="/">
                <img src="media/templates/site/magnum/images/small-logo.png" alt="<?php echo Text::_('TPL_MAGNUM_SITE_NAME_FULL'); ?>" />
                <span class="smal-logo-text"><?php echo Text::_('TPL_MAGNUM_SITE_NAME_SHORT'); ?></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar<?php echo $module->id; ?>" aria-controls="navbar<?php echo $module->id; ?>" aria-expanded="false" aria-label="<?php echo Text::_('MOD_MENU_TOGGLE'); ?>">
        <span class="bi bi-justify" aria-hidden="true"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar<?php echo $module->id; ?>">
        <?php require __DIR__ . '/default.php'; ?>
    </div>
</div>
</nav>
