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
$params = json_decode($field->value);
$class = $params->container_class;

if ($params->single_folder == 'folder')
{
	// read the .jpg from the selected directory
	jimport('joomla.filesystem.folder');
	$filter = '(\.png|\.jpg|\.jpeg)';
	$imagesPath = 'images/' . $params->directory;
	$images = JFolder::files($imagesPath, $filter);
}
else
{
	$images = (array) $params->single_pictures;
}

$frwk   = 'uikit2';
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
