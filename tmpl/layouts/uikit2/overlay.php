<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

extract($displayData);

?>
<figure class="uk-thumbnail uk-overlay uk-overlay-hover">
	<?php echo HTMLHelper::_('image', $thumb, $alt, array('class' => 'uk-overlay-spin')); ?>
	<figcaption class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
		<<?php echo $titleContainer; ?>><?php echo $title; ?></<?php $titleContainer; ?>>
	</figcaption>
</figure>
