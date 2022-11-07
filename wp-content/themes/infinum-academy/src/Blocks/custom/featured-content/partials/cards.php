<?php

/**
 * Template for the Featured Content view - Card content map from ID.
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

$items = $attributes['items'] ?? [];
$blockSsr = $attributes['blockSsr'] ?? '';

$output = [];

if (!$items) {
	return $output;
}

foreach ($items as $item) {
	if (is_int($item)) {
		$attributes = [
			'cardHeadingContent' => get_the_title($item),
			'cardParagraphContent' => get_the_excerpt($item),
			'cardButtonUrl' => get_the_permalink($item),
			'cardButtonContent' => __('View More', 'infinum-academy'),
			'cardImageUrl' => get_the_post_thumbnail_url($item, 'large'),
			'blockSsr' => $blockSsr,
		];
	} else {
		$item = (array) $item;
		$authors = (array) $item['authors'];
		$firstAuthor = !empty($authors) ? (array) $authors[0] : [];
		$formats = (array) $item['formats'];

		$attributes = [
			'cardHeadingContent' => $item['title'],
			'cardParagraphContent' => $firstAuthor['name'] ?? '',
			'cardButtonUse' => false,
			'cardImageUrl' => $formats['image/jpeg'],
			'blockSsr' => $blockSsr,
		];
	}

	echo Components::render(
		'card',
		Components::props(
			'card',
			$attributes
		),
		'',
		true
	);
}
