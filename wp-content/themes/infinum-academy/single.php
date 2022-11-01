<?php

/**
 * Single page for Posts
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

get_header();

$blockClass = 'layout-single';

if (have_posts()) {
	while (have_posts()) {
		the_post();
		$postId = get_the_ID();
		$postDate = get_the_time('d.m.Y. @ g:i');
		$postAuthor = get_the_author_meta('display_name');
		$postContent = apply_filters('the_content', get_post_field('post_content', $postId));

		$categoryDetail = get_the_category($postId);
		$categoriesContent = '';
		ob_start();
		foreach ($categoryDetail as $cd) {
			echo Components::render(
				'button',
				[
					'buttonColor' => 'grey',
					'buttonContent' => $cd->name,
					'blockClass' => $blockClass
				],
				'',
				true
			);
		}
		$categoriesContent = ob_get_clean();

		echo Components::render(
			'layout-single',
			[
				'layoutSingleMeta' => [
					Components::render(
						'heading',
						[
							'headingContent' => get_the_title(),
							'headingSize' => 'bigger',
							'headingWeight' => 'bold',
							'blockClass' => $blockClass,
						],
						'',
						true
					),
					Components::render(
						'image',
						[
							'imageUrl' => get_the_post_thumbnail_url(),
							'blockClass' => $blockClass,
						],
						'',
						true
					),
					Components::render(
						'paragraph',
						[
							'paragraphContent' => "{$postDate}  By: {$postAuthor}",
							'paragraphWeight' => 'bold',
							'blockClass' => $blockClass,
							'additionalClass' => "meta-data"
						],
						'',
						true
					),
					Components::render(
						'paragraph',
						[
							'paragraphContent' => $categoriesContent,
							'blockClass' => $blockClass,
							'additionalClass' => "meta-categories"
						],
						'',
						true
					),
				],
				'layoutSingleSidebar' => [
					Components::render(
						'share',
						[],
						'',
						true
					),
				],
				'layoutSingleMain' => $postContent,
			],
			'',
			true
		);
	}
}

get_footer();
