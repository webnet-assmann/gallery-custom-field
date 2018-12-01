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
?>

<div class="gallery" data-uk-grid-margin>
	<?php foreach ($images as $image) : ?>
		<div>
			<?php
			$attr = null;

			if (empty($imagesPath))
			{
				$imgPath = $image->picture;
				$alt     = $image->picture_alt;
				$caption = $image->picture_caption;

				if ($image->picture_title_on
					&& (!empty($caption) && $image->picture_caption_position != 'overlay'))
				{
					$attr = array('title' => $image->picture_title);
				}
			}
			else
			{
				$imgPath = $imagesPath . '/' . $image;
				$alt     = str_replace("-", " ", File::stripExt($image));
			}

			$img = JHtml::_('image', $imgPath, $alt, $attr, false); ?>

			<?php echo JHtml::_('link', $imgPath, $img, array('data-uk-lightbox' => '{group:\'gallery-group\'}')); ?>
		</div>
	<?php endforeach; ?>
</div>
