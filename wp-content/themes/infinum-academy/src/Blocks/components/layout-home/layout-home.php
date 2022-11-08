<?php

/**
 * Layout single component view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$layoutUse = Components::checkAttr('layoutHomeUse', $attributes, $manifest);
if (!$layoutUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$layoutHomeMeta = Components::checkAttr('layoutHomeMeta', $attributes, $manifest);
$layoutHomeSidebar = Components::checkAttr('layoutHomeSidebar', $attributes, $manifest);
$layoutHomeMain = Components::checkAttr('layoutHomeMain', $attributes, $manifest);
$paragraphContent = Components::checkAttr('paragraphContent', $attributes, $manifest);

$layoutHomeClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

$unique = Components::getUnique();

?>

<div
	class="<?php echo esc_attr($layoutHomeClass); ?>"
	data-id="<?php echo esc_attr($unique); ?>"
>
	<?php echo Components::outputCssVariables($attributes, $manifest, $unique); ?>
	<div class="<?php echo esc_attr("{$componentClass}__intro"); ?>">
		<div class="<?php echo esc_attr("{$componentClass}__framing"); ?>">
		<?php
			echo Components::render(
				'heading',
				Components::props('heading', $attributes, [
					'blockClass' => $componentClass,
					'headingContent' => 'This is blog about travel photography',
					'headingSize' => 'huge',
					'headingColor' => 'white'
				])
			);
			?>
		</div>
	</div>

	<div class="<?php echo esc_attr("{$componentClass}__view"); ?>">
		<?php echo Components::ensureString($layoutHomeMain); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped 
		?>
	</div>

	<div class="<?php echo esc_attr("{$componentClass}__second-page"); ?>">
		<div class="<?php echo esc_attr("{$componentClass}__second-page__background"); ?>"> 
			<?php
				echo Components::render(
					'bordered-grid',
					Components::props('bordered-grid', $attributes, [
						'blockClass' => $componentClass,
						'headingOneContent' => 'Travel page',
						'paragraphOneContent' => $paragraphContent,
						'headingTwoContent' => 'Travel page',
						'paragraphTwoContent' => $paragraphContent,
						'headingThreeContent' => 'Travel page',
						'paragraphThreeContent' => $paragraphContent,
						'headingFourContent' => 'Travel page',
						'paragraphFourContent' => $paragraphContent,
						])
				);
				?>
		</div>
	</div>
</div>
