<?php

/**
 * The Media specific functionality.
 *
 * @package InfinumAcademy\Media
 */

declare(strict_types=1);

namespace InfinumAcademy\Media;

use InfinumAcademyVendor\EightshiftLibs\Media\AbstractMedia;

/**
 * Class Media
 *
 * This class handles all media options. Sizes, Types, Features, etc.
 */
class Media extends AbstractMedia
{
	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_action('after_setup_theme', [$this, 'addThemeSupport'], 20);

		// WebP.
		if (\extension_loaded('gd')) {
			\add_filter('wp_generate_attachment_metadata', [$this, 'generateWebPMedia'], 10, 2);
			\add_filter('wp_update_attachment_metadata', [$this, 'generateWebPMedia'], 10, 2);
			\add_action('delete_attachment', [$this, 'deleteWebPMedia']);
		}

		\add_filter('image_size_names_choose', [$this, 'myCustomSizes']);
	}


	/**
	 * Enable theme support
	 *
	 * For full list check: https://developer.wordpress.org/reference/functions/add_theme_support/
	 *
	 * @return void
	 */
	public function addThemeSupport(): void
	{
		\add_theme_support('title-tag');
		\add_theme_support('html5', ['style', 'script']);
		// Enables HTML5 markup support and explicitly states support for script and style tags, so WP doesn't insert the type attribute on those tags.
		// Registering the type attribute is not compliant with the HTML5 specification.
		\add_theme_support('post-thumbnails');

		// Register custom image size 600x600px.
		\add_image_size('square600', 600, 600);
	}

	/**
	 * Map custom image size strings to labels
	 *
	 * @param array<string> $sizes custom sizes array.
	 * @return array<string>
	 */
	public function myCustomSizes($sizes): array
	{
		return \array_merge($sizes, [
			'square600' => \__('Medium size image', 'infinum-academy')
		]);
	}
}
