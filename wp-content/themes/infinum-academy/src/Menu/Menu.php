<?php

/**
 * The Menu specific functionality.
 *
 * @package InfinumAcademy\Menu
 */

declare(strict_types=1);

namespace InfinumAcademy\Menu;

use InfinumAcademyVendor\EightshiftLibs\Menu\AbstractMenu;

/**
 * Class Menu
 */
class Menu extends AbstractMenu
{
	/**
	 * Header menu string
	 *
	 * @var string
	 */
	public const HEADER_MENU = 'header_main_nav';

	/**
	 * Footer menu string
	 *
	 * @var string
	 */
	public const FOOTER_MENU = 'footer_nav';

	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_action('after_setup_theme', [$this, 'registerMenuPositions'], 11);
	}

	/**
	 * Return all menu positions
	 *
	 * @return array<string> Menu positions with slug => name structure.
	 */
	public function getMenuPositions(): array
	{
		return [
			self::HEADER_MENU => \esc_html__('Main Menu', 'infinum-academy'),
			self::FOOTER_MENU => \esc_html__('Footer Menu', 'infinum-academy'),
		];
	}
}
