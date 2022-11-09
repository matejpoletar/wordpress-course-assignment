<?php

/**
 * Main header file
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;
use InfinumAcademy\Manifest\Manifest;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	// Head Component.
	echo Components::render(
		'head',
		[
			'icon' => apply_filters(Manifest::MANIFEST_ITEM, 'logo.svg'),
		]
	);

	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

<?php
// Header Component.
echo Components::render(
	'layout-three-columns',
	[
		'layoutThreeColumnsHtmlTag' => 'nav',
		'additionalClass' => 'header',
		'layoutThreeColumnsRight' => [
			Components::render(
				'menu',
				[
					'variation' => 'horizontal',
					'parentClass' => 'header',
				]
			),
			Components::render('hamburger'),
		]
	]
);

// Menu Drawer Style Component.
echo Components::render(
	'drawer',
	[
		'drawerTrigger' => 'js-hamburger',
		'drawerMenu' => Components::render(
			'menu',
			[
				'variation' => 'vertical',
				'parentClass' => 'drawer',
			]
		),
	]
);
?>

<main class="main-content" id="main-content">
