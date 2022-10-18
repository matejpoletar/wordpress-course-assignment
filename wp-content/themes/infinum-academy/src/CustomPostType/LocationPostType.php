<?php

/**
 * File that holds class for LocationPostType custom post type registration.
 *
 * @package InfinumAcademy\CustomPostType
 */

declare(strict_types=1);

namespace InfinumAcademy\CustomPostType;

use InfinumAcademyVendor\EightshiftLibs\CustomPostType\AbstractPostType;

/**
 * Class LocationPostType.
 */
class LocationPostType extends AbstractPostType
{
	/**
	 * Post type slug constant.
	 *
	 * @var string
	 */
	public const POST_TYPE_SLUG = 'location';

	/**
	 * URL slug for the custom post type.
	 *
	 * @var string
	 */
	public const POST_TYPE_URL_SLUG = 'location';

	/**
	 * Rest API Endpoint slug constant.
	 *
	 * @var string
	 */
	public const REST_API_ENDPOINT_SLUG = 'locations';

	/**
	 * Capability type for projects post type.
	 *
	 * @var string
	 */
	public const POST_CAPABILITY_TYPE = 'post';

	/**
	 * Location of menu in sidebar.
	 *
	 * @var int
	 */
	public const MENU_POSITION = 20;

	/**
	 * Set menu icon.
	 *
	 * @var string
	 */
	public const MENU_ICON = 'dashicons-location';

	/**
	 * Get the slug to use for the Projects custom post type.
	 *
	 * @return string Custom post type slug.
	 */
	protected function getPostTypeSlug(): string
	{
		return self::POST_TYPE_SLUG;
	}

	/**
	 * Get the arguments that configure the Projects custom post type.
	 *
	 * @return array<mixed> Array of arguments.
	 */
	protected function getPostTypeArguments(): array
	{
		$nouns = [
			\esc_html_x(
				'Location',
				'post type upper case singular name',
				'infinum-academy'
			),
			\esc_html_x(
				'location',
				'post type lower case singular name',
				'infinum-academy'
			),
			\esc_html_x(
				'Locations',
				'post type upper case plural name',
				'infinum-academy'
			),
			\esc_html_x(
				'locations',
				'post type lower case plural name',
				'infinum-academy'
			),
		];

		$labels = $this->getGeneratedLabels($nouns);

		return [
			'label' => $nouns[0],
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'capability_type' => self::POST_CAPABILITY_TYPE,
			'has_archive' => true,
			'rewrite' => ['slug' => static::POST_TYPE_URL_SLUG],
			'hierarchical' => false,
			'menu_icon' => static::MENU_ICON,
			'menu_position' => static::MENU_POSITION,
			'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions'],
			'show_in_rest' => true,
			'rest_base' => static::REST_API_ENDPOINT_SLUG,
		];
	}
}
