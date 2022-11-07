<?php

/**
 * Display regular index/home page
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

get_header();

$componentClass = 'layout-home';

$pageContent = '';

if (have_posts()) {
	ob_start();
	while (have_posts()) {
		the_post();
		the_content();
	}
	$pageContent = ob_get_clean();
}

echo Components::render(
	'layout-home',
	[
		'layoutHomeMain' => $pageContent
	],
	'',
	true
);

get_footer();