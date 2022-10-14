<?php

/**
 * Theme Name: Infinum Academy
 * Description: Infinum Academy Wordpress course
 * Author: Team Eightshift
 * Author URI: https://eightshift.com/
 * Version: 1.0.0
 * Text Domain: infinum-academy
 *
 * @package InfinumAcademy
 */

declare(strict_types=1);

namespace InfinumAcademy;

use InfinumAcademy\Main\Main;
use InfinumAcademyVendor\EightshiftLibs\Cli\Cli;

/**
 * If this file is called directly, abort.
 */
if (! \defined('WPINC')) {
	die;
}

/**
 * Include the autoloader so we can dynamically include the rest of the classes.
 */
$loader = require __DIR__ . '/vendor/autoload.php';

/**
 * Begins execution of the theme.
 *
 * Since everything within the theme is registered via hooks,
 * then kicking off the theme from this point in the file does
 * not affect the page life cycle.
 */
if (\class_exists(Main::class)) {
	(new Main($loader->getPrefixesPsr4(), __NAMESPACE__))->register();
}

/**
 * Run all WPCLI commands.
 */
if (\class_exists(Cli::class)) {
	(new Cli())->load('boilerplate');
}
