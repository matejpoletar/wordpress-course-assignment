<?php

/**
 * Menu component responsible for rendering and styling just the menu.
 *
 * @package InfinumAcademy
 */

use InfinumAcademy\Menu\Menu;
use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$use = $attributes['use'] ?? true;

if (!$use) {
	return;
}

$componentClass = $attributes['componentClass'] ?? 'menu';

$name = $attributes['menu'] ?? 'header_main_nav';
$modifier = $attributes['modifier'] ?? '';
$variation = isset($attributes['variation']) ? "{$componentClass}-{$attributes['variation']}" : $componentClass;
$jsClass = $attributes['jsClass'] ?? '';

$parentClasses = Components::classnames([
	$jsClass ? "js-{$jsClass}" : '',
]);

$bemMenu = Menu::bemMenu( // @phpstan-ignore-line will be fixed in the stubs.
	$name,
	$variation,
	$parentClasses,
	$modifier ? "{$variation}--{$modifier}" : ''
);

if (!empty($bemMenu) && !$bemMenu) {
	echo esc_html($bemMenu);
}
