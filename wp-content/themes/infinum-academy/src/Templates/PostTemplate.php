<?php

/**
 * Register post template.
 *
 * @package InfinumAcademy\Templates;
 */

declare(strict_types=1);

namespace InfinumAcademy\Templates;

use InfinumAcademyVendor\EightshiftLibs\Services\ServiceInterface;

/**
 * Register post template.
 */
class PostTemplate implements ServiceInterface
{
	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_action('init', [$this, 'buildPostTemplate']);
	}

	/**
	 * Defines the template for posts
	 *
	 * @return void
	 */
	public function buildPostTemplate(): void
	{
		$postObject = \get_post_type_object('post');
		if (!$postObject) {
			return;
		}
		$postObject->template = [
			[
				'eightshift-boilerplate/paragraph',
				[
					'wrapperSpacingBottomLarge' => 30,
					'lock' => [
						'move' => true,
						'remove' => true
					]
				],
			],
			[
				'eightshift-boilerplate/image',
				[
				'imageImageFull' => true,
				'lock' => [
					'move' => true,
					'remove' => true
				]
				]
			],
			[
				'eightshift-boilerplate/paragraph',
				[
				'wrapperSpacingTopLarge' => 10,
				'wrapperSpacingTopInLarge' => 0,
				'wrapperSpacingBottomInLarge' => 0,
				'paragraphAlign' => 'center',
				'lock' => [
					'move' => true,
					'remove' => true
				]
				],
			],
			[
				'eightshift-boilerplate/heading',
				[
					'wrapperSpacingTopLarge' => 30,
					'wrapperSpacingBottomLarge' => 30,
					'headingHeadingSize' => 'big',
					'headingHeadingWeight' => 'bold',
					'lock' => [
						'move' => true,
						'remove' => true
					]
				],
			],
			[
				'eightshift-boilerplate/paragraph',
				[
					'lock' => [
						'move' => true,
						'remove' => true
					]
				],
			],
			[
				'eightshift-boilerplate/paragraph',
				[
					'wrapperSpacingTopLarge' => 50,
					'lock' => [
						'move' => true,
						'remove' => true
					]
				],
			],
			];
	}
}
