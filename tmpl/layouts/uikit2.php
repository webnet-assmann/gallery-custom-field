<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Filesystem\File;
use \Joomla\CMS\HTML\HTMLHelper;

extract($displayData);
$group = md5(json_encode($images));
?>

<div class="uk-grid gallery" data-uk-grid-margin>
	<?php foreach ($images as $image) : ?>
		<div class="uk-width-xlarge-1-2">
			<?php
			$attr = null;

			if ($imagesPath === false)
			{
				$imgPath = $image->picture;
				$alt     = $image->picture_alt;
				$caption = $image->picture_caption;
			}
			else
			{
				$imgPath = $imagesPath . '/' . $image;
				$alt     = str_replace("-", " ", File::stripExt($image));
			}

			$img  = HTMLHelper::_('image', $imgPath, $alt, false);
			$attr = array(
				'title'            => $image->picture_title,
				'data-uk-lightbox' => '{group:\'' . $group . '\'}',
			);

			echo HTMLHelper::_('link', $imgPath, $img, $attr); ?>
		</div>
	<?php endforeach; ?>
</div>
