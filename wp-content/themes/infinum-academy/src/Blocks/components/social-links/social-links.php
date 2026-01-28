<?php

/**
 * Social Links
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);
$globalManifest = Components::getManifest(dirname(__DIR__, 2));

$unique = Components::getUnique();

$socialLinksUse = Components::checkAttr('socialLinksUse', $attributes, $manifest);
if (!$socialLinksUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$socialLinksItems = Components::checkAttr('socialLinksItems', $attributes, $manifest);

$socialLinksClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

echo Components::render(
	'heading',
	[
		'headingContent' => 'Follow us on social media',
		'headingSize' => 'big'
	]
);
?>
<ul class="<?php echo esc_html($socialLinksClass); ?>">
	
	<?php
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);

	if (!is_iterable($socialLinksItems)) {
		return;
	}

	foreach ($socialLinksItems as $socialLink) { ?>
		<?php
		$href = $socialLink['href'] ?? '';
		$icon = $socialLink['icon'] ?? '';
		$linkTitle = $socialLink['title'] ?? '';

		if (
			empty($href)
			|| empty($icon)
			|| !isset($manifest['icons'][$icon])
		) {
			continue;
		}

		?>
		<li class="<?php echo esc_html("{$componentClass}__item"); ?>">
			<a
				class="<?php echo esc_html("{$componentClass}__link"); ?>"
				href="<?php echo esc_url($href); ?>"
				title="<?php echo esc_attr($linkTitle); ?>"
				target="_blank"
				rel="noreferrer noopener"
			>
				<img class="<?php echo esc_html("{$componentClass}__img"); ?>"
					 alt="<?php echo esc_attr($linkTitle); ?>"
					 src="<?php echo esc_attr($manifest['icons'][$icon]); ?>"
				/>
			</a>
		</li>
	<?php } ?>
</ul>
