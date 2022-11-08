<?php

/**
 * Display footer
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;
use InfinumAcademy\Menu\Menu;

?>

</main>

<?php
echo Components::render(
	'layout-three-columns',
	[
		'layoutThreeColumnsAriaRole' => 'contentinfo',
		'additionalClass' => 'footer',
		'layoutThreeColumnsLeft' => Components::render(
			'social-links',
			[]
		),
	]
),

Components::render(
	'layout-three-columns',
	[
		'layoutThreeColumnsAriaRole' => 'contentinfo',
		'additionalClass' => 'footer',
		'layoutThreeColumnsLeft' => Components::render(
			'menu',
			[
				'variation' => 'horizontal',
				'menu' => Menu::FOOTER_MENU,
			]
		),
		'layoutThreeColumnsRight' => Components::render(
			'copyright',
			[
				'copyrightYear' => gmdate('Y'),
				'copyrightContent' => esc_html__('All love and happiness', 'infinum-academy'),
			]
		),
	]
);

wp_footer();
?>
</body>
</html>
