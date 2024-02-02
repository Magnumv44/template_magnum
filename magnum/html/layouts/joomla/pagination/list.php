<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2016 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$list = $displayData['list'];

?>
<nav class="pagination__wrapper" aria-label="<?php echo Text::_('JLIB_HTML_PAGINATION'); ?>">
    <ul class="pagination ms-0 mb-4 flex-wrap justify-content-center">
        <?php echo $list['start']['data']; ?>
        <?php echo $list['previous']['data']; ?>

        <?php // Блок тимчасового хака для посторінкової навігації, розміщений до офіційного вирішення проблеми
            $maxPages = 5;
            $list["pages"] = array_values($list["pages"]);
            
            while (count($list["pages"]) > $maxPages) {
                foreach ($list["pages"] as $key => $val) {
                    if (!$val["active"]) {
                        break;
                    }
                }
                
                if ($key > $maxPages / 2) {
                    array_shift($list["pages"]);
                } else {
                    array_pop($list["pages"]);
                }
            }
        ?>

        <?php foreach ($list['pages'] as $page) : ?>
            <?php echo $page['data']; ?>
        <?php endforeach; ?>

        <?php echo $list['next']['data']; ?>
        <?php echo $list['end']['data']; ?>
    </ul>
</nav>
