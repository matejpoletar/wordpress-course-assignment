<?php

/**
 * Template for the CardOverlay Block view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$componentClass = $manifest['componentClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$unique = Components::getUnique();

$cardClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
]);

$innerContainerClass = Components::checkAttr('innerContainerClass', $attributes, $manifest);

?>

<div class="<?php echo esc_attr($cardClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
	<?php
		echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);

		echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'image',
			Components::props('image', $attributes, [
				'blockClass' => $componentClass,
			])
		)
		?>
	<div class="<?php echo esc_attr($innerContainerClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('heading', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraph', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
	</div>
</div>
