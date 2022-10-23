<?php

/**
 * Template for the BorderedGrid Block view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$componentClass = $manifest['componentClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $manifest['selectorClass'] ?? '';

$unique = Components::getUnique();

?>

<div class="<?php echo esc_attr($blockClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingOne', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphOne', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingTwo', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphTwo', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingThree', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphThree', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingFour', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphFour', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
	</div>
</div>
