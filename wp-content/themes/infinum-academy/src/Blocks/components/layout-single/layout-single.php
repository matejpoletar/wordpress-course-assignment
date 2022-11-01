<?php

/**
 * Layout single component view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$layoutUse = Components::checkAttr('layoutSingleUse', $attributes, $manifest);
if (!$layoutUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$layoutSingleMeta = Components::checkAttr('layoutSingleMeta', $attributes, $manifest);
$layoutSingleSidebar = Components::checkAttr('layoutSingleSidebar', $attributes, $manifest);
$layoutSingleMain = Components::checkAttr('layoutSingleMain', $attributes, $manifest);
$layoutSingleTag = Components::checkAttr('layoutSingleTag', $attributes, $manifest);

$layoutSingleClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

$unique = Components::getUnique();

?>

<<?php echo esc_attr($layoutSingleTag); ?>
	class="<?php echo esc_attr($layoutSingleClass); ?>"
	data-id="<?php echo esc_attr($unique); ?>"
>
	<?php echo Components::outputCssVariables($attributes, $manifest, $unique); ?>
	<div class="<?php echo esc_attr("{$componentClass}__wrap"); ?>">
		<div class="<?php echo esc_attr("{$componentClass}__meta"); ?>">
			<?php echo Components::ensureString($layoutSingleMeta); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>	
		<div class="<?php echo esc_attr("{$componentClass}__sidebar"); ?>">
			<?php echo Components::ensureString($layoutSingleSidebar); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>

		<div class="<?php echo esc_attr("{$componentClass}__main"); ?>">
			<?php echo Components::ensureString($layoutSingleMain); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>
	</div>
</<?php echo esc_attr($layoutSingleTag); ?>>
