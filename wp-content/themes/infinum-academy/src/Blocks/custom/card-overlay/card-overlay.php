<?php

/**
 * Template for the CardOverlay Block view.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$blockClass = $attributes['blockClass'] ?? '';

echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'card-overlay',
	Components::props('card-overlay', $attributes)
);
