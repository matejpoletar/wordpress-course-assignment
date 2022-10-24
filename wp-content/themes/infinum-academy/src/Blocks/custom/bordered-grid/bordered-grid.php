<?php

/**
 * Template for the BorderedGrid Block view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

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
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphOne', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingTwo', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphTwo', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingThree', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphThree', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($selectorClass); ?>">
		<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('headingFour', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraphFour', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>
</div>
