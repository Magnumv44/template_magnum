<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<dd class="hits">
    <span class="bi bi-eye" aria-hidden="true"></span>
    <meta content="UserPageVisits:<?php echo $displayData['item']->hits; ?>">
    <?php echo Text::sprintf($displayData['item']->hits); ?>
</dd>
