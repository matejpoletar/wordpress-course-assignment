<?php

/**
 * The Blog_Taxonomy specific functionality.
 *
 * @package InfinumAcademy\CustomTaxonomy
 */

declare(strict_types=1);

namespace InfinumAcademy\CustomTaxonomy;

use InfinumAcademyVendor\EightshiftLibs\CustomTaxonomy\AbstractTaxonomy;
use InfinumAcademy\CustomPostType\LocationPostType;

/**
 * Class LocationCategoryTaxonomy
 */
class LocationCategoryTaxonomy extends AbstractTaxonomy
{
	/**
	 * Taxonomy slug constant.
	 *
	 * @var string
	 */
	public const TAXONOMY_SLUG = 'location-category';

	/**
	 * Taxonomy post type slug constant.
	 *
	 * @var string
	 */
	public const TAXONOMY_POST_TYPE_SLUG = LocationPostType::POST_TYPE_SLUG;

	/**
	 * Rest API Endpoint slug constant.
	 *
	 * @var string
	 */
	public const REST_API_ENDPOINT_SLUG = 'location-category';

	/**
	 * Get the slug of the custom taxonomy
	 *
	 * @return string Custom taxonomy slug.
	 */
	protected function getTaxonomySlug(): string
	{
		return static::TAXONOMY_SLUG;
	}

	/**
	 * Get the post type slug(s) that use the taxonomy.
	 *
	 * @return string|array<string> Custom post type slug or an array of slugs.
	 */
	protected function getPostTypeSlug()
	{
		return self::TAXONOMY_POST_TYPE_SLUG;
	}

	/**
	 * Get the arguments that configure the custom taxonomy.
	 *
	 * @return array<mixed> Array of arguments.
	 */
	protected function getTaxonomyArguments(): array
	{
		$nouns = [
			\esc_html_x(
				'Location Category',
				'taxonomy upper case singular name',
				'infinum-academy'
			),
			\esc_html_x(
				'location category',
				'taxonomy lower case singular name',
				'infinum-academy'
			),
			\esc_html_x(
				'Location Categories',
				'taxonomy upper case plural name',
				'infinum-academy'
			),
			\esc_html_x(
				'location categories',
				'taxonomy lower case plural name',
				'infinum-academy'
			),
		];

		$labels = $this->getGeneratedLabels($nouns);

		return [
			'hierarchical' => true,
			'label' => $nouns[0],
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'public' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rest_base' => static::REST_API_ENDPOINT_SLUG,
			'rewrite' => [
				'hierarchical' => true,
				'with_front' => false,
			],
		];
	}
}
