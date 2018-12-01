<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!$field->value || $field->value == '-1') {
    return;
}
// get the folder name in images directory
$path = $field->value;
$class = $fieldParams->get('container_class');

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $path);
?>

<div class="gallery <?php echo $class; ?>" data-uk-grid-margin>
    <?php foreach ($images as $image) : ?>
        <div>
	        <?php $img = JHtml::_('image', 'images/' . $path . '/' . $image, str_replace("-"," ",substr(strtoupper($image),0,-4)), array('title' => str_replace("-"," ",substr(strtoupper($image),0,-4))), false); ?>

	        <?php echo JHtml::_('link', 'images/' . $path . '/' . $image, $img, array('data-uk-lightbox' => '{group:\'my-group\'}', 'title' => str_replace("-"," ",substr(strtoupper($image),0,-4)))); ?>
        </div>
    <?php endforeach; ?>
</div>
