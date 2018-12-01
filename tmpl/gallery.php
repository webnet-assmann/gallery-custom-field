<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!$field->value || $field->value == '-1')
{
	return;
}
// get the folder name in images directory
$path  = $field->value;
$class = $fieldParams->get('container_class');

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
$filter = '(\.png|\.jpg|\.jpeg)';
$images = JFolder::files('images/' . $path, $filter);
$frwk   = 'default';
?>

<div class="gallery_container<?php echo $class; ?>">
	<?php
	ob_start();
	include 'framework/' . $frwk . '.php';;
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
	?>
</div>
