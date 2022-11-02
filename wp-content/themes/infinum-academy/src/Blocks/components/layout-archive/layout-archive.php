<?php

/**
 * Layout archive component view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$layoutUse = Components::checkAttr('layoutArchiveUse', $attributes, $manifest);
if (!$layoutUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$layoutArchiveTag = Components::checkAttr('layoutArchiveTag', $attributes, $manifest);
$layoutArchiveIntro = Components::checkAttr('layoutArchiveIntro', $attributes, $manifest);
$layoutArchiveItems = Components::checkAttr('layoutArchiveItems', $attributes, $manifest);
$layoutArchiveRowItems = Components::checkAttr('layoutArchiveRowItems', $attributes, $manifest);
$layoutArchiveLoadMoreId = Components::checkAttr('layoutArchiveLoadMoreId', $attributes, $manifest);

$layoutArchiveClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

$unique = Components::getUnique();

?>

<<?php echo esc_attr($layoutArchiveTag); ?>
	class="<?php echo esc_attr($layoutArchiveClass); ?>"
	data-id="<?php echo esc_attr($unique); ?>"
	data-layout-row-items="<?php echo esc_attr($layoutArchiveRowItems); ?>"
>
	<?php echo Components::outputCssVariables($attributes, $manifest, $unique); ?>
	<div class="<?php echo esc_attr("{$componentClass}__wrap"); ?>">
		<div class="<?php echo esc_attr("{$componentClass}__intro"); ?>">
			<?php echo Components::ensureString($layoutArchiveIntro); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>	
		<div
			class="<?php echo esc_attr("{$componentClass}__items"); ?>"
			data-layout-row-items="<?php echo esc_attr($layoutArchiveLoadMoreId); ?>"
		>
			<?php echo Components::ensureString($layoutArchiveItems); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>
	</div>
</<?php echo esc_attr($layoutArchiveTag); ?>>
