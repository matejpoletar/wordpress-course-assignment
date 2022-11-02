<?php

/**
 * Display regular index/home page
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

get_header();

$componentClass = 'layout-archive';
$archiveContent = '';
$postTypeObject = get_post_type_object(get_post_type());

if (have_posts()) {
	ob_start();
	while (have_posts()) {
		the_post();
		$postId = get_the_ID();
		?>
		<a href="
		<?php echo esc_attr(get_the_permalink());
		?>">
			<?php
			echo Components::render(
				'card',
				[
					'introContent' => get_the_time('d.m.Y. @ g:i'),
					'introSize' => 'small',
					'headingContent' => get_the_title(),
					'paragraphContent' => wp_trim_words(get_the_excerpt(), 20),
					'cardShowButton' => false,
					'imageUrl' => get_the_post_thumbnail_url(),
					'cardMetaItems' => get_the_category($postId)
				],
				'',
				true
			);
			?>
		</a>
		<?php
	}
	$archiveContent = ob_get_clean();
}

echo Components::render(
	'layout-archive',
	[
		'layoutArchiveRowItems' => 3,
		'layoutArchiveIntro' => Components::render(
			'heading',
			[
				'headingContent' => sprintf('%s archive', $postTypeObject->label),
				'headingSize' => 'huge',
			],
			'',
			true
		),
		'layoutArchiveItems' => $archiveContent,
	]
);

get_footer();
