<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create a shortcut for params.
$params  = &$this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $this->item->params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

$currentDate       = Factory::getDate()->format('Y-m-d H:i:s');
$isExpired         = !is_null($this->item->publish_down) && $this->item->publish_down < $currentDate;
$isNotPublishedYet = $this->item->publish_up > $currentDate;
$isUnpublished     = $this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $isNotPublishedYet || $isExpired;
?>

<?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>

<div class="item-content">
    <?php if ($isUnpublished) : ?>
        <div class="system-unpublished">
    <?php endif; ?>

    <?php if ($params->get('show_title')) : ?>
        <h2 class="item-title" itemprop="headline">
        <?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
            <a href="<?php echo Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>" itemprop="url">
                <?php echo $this->escape($this->item->title); ?>
            </a>
        <?php else : ?>
            <?php echo $this->escape($this->item->title); ?>
        <?php endif; ?>
        </h2>
    <?php endif; ?>

    <?php if ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
        <span class="badge bg-warning text-light"><?php echo Text::_('JUNPUBLISHED'); ?></span>
    <?php endif; ?>
    <?php if ($isNotPublishedYet) : ?>
        <span class="badge bg-warning text-light"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
    <?php endif; ?>
    <?php if ($isExpired) : ?>
        <span class="badge bg-warning text-light"><?php echo Text::_('JEXPIRED'); ?></span>
    <?php endif; ?>

    <?php if ($canEdit) : ?>
        <?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item)); ?>
    <?php endif; ?>

    <?php // Content is generated by content plugin event "onContentAfterTitle" ?>
    <?php echo $this->item->event->afterDisplayTitle; ?>

    <?php // @todo Not that elegant would be nice to group the params ?>
    <?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
        || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

    <?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
        <?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
    <?php endif; ?>
    <?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
        <?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
    <?php endif; ?>

    <?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
    <?php echo $this->item->event->beforeDisplayContent; ?>

    <?php echo $this->item->introtext; ?>

    <div class="content-info-full">
    <?php if ($info == 1 || $info == 2) : ?>
        <?php if ($useDefList) : ?>
            <?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
        <?php endif; ?>
        <?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
            <?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($params->get('show_readmore') && $this->item->readmore) :
        if ($params->get('access-view')) :
            $link = Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
        else :
            $menu = Factory::getApplication()->getMenu();
            $active = $menu->getActive();
            $itemId = $active->id;
            $link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
            $link->setVar('return', base64_encode(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
        endif; ?>

        <?php echo LayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

    <?php endif; ?>
    </div>

    <?php if ($isUnpublished) : ?>
        </div>
    <?php endif; ?>

</div>

<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
<?php echo $this->item->event->afterDisplayContent; ?>
