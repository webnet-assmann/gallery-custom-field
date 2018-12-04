<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Gallery
 *
 * @copyright   Copyright (C) Guido De Gobbis, Barbara Assmann.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Layout\FileLayout;

if (!$field->value || $field->value == '-1' || !in_array($context, array('com_content.article', 'com_content.category')))
{
	return;
}

// Get the params set in article/category for gallery
$params = json_decode($field->value);
$class  = $params->container_class;
$frwk   = 'default';

if (!empty($params->layout))
{
	$frwk = $params->layout;
}

$theme             = JFactory::getApplication()->getTemplate();
$themeOverridePath = JPATH_THEMES . '/' . $theme . '/html/plg_' . $this->_type . '_' . $this->_name;
$layoutBasePath    = JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name . '/tmpl/layouts';
$thumbCachePath    = JPATH_SITE . '/cache/plg_' . $this->_type . '_' . $this->_name . '/thumbnails';
$imagesPath    = false;

$renderer = new FileLayout($frwk, $layoutBasePath, array('component' => 'none'));
$renderer->addIncludePath($themeOverridePath);

if ($params->single_folder == 'folder')
{
	// read the .jpg from the selected directory
	jimport('joomla.filesystem.folder');
	$filter     = '(\.png|\.jpg|\.jpeg)';
	$imagesPath = 'images/' . $params->directory;
	$images     = JFolder::files($imagesPath, $filter);
}
else
{
	$images = (array) $params->single_pictures;
}

$displayData = array(
	'images' => $images,
	'imagesPath' => $imagesPath,
	'thumbCachePath' => $thumbCachePath,
	'itemsXline' => $params->items_x_line,
);
?>

<div class="gallery_container<?php echo $class; ?>">
	<?php echo $renderer->render($displayData); ?>
</div>
