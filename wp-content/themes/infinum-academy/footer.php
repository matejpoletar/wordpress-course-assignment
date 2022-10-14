<?php

/**
 * Display footer
 *
 * @package InfinumAcademy
 */

use InfinumAcademyVendor\EightshiftLibs\Helpers\Components;

?>

</main>

<?php
echo Components::render(
	'layout-three-columns',
	[
		'layoutThreeColumnsAriaRole' => 'contentinfo',
		'additionalClass' => 'footer',
		'layoutThreeColumnsLeft' => Components::render(
			'copyright',
			[
				'copyrightBy' => esc_html__('Eightshift', 'infinum-academy'),
				'copyrightYear' => gmdate('Y'),
				'copyrightContent' => esc_html__('Made with 🧡  by Team Eightshift', 'infinum-academy'),
			]
		),
		'layoutThreeColumnsRight' => Components::render(
			'menu',
			[
				'variation' => 'horizontal'
			]
		),
	]
);

wp_footer();
?>
</body>
</html>
