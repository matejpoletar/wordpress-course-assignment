<?php

/**
 * Template for the CardOverlay Block view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$componentClass = $attributes['componentClass'] ?? '';

$cardOverlayContent = Components::checkAttr('cardOverlayContent', $attributes, $manifest);

?>

<div class="<?php echo esc_attr($componentClass); ?>">
	<?php
		// phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
		echo $cardOverlayContent;
	?>
</div>
