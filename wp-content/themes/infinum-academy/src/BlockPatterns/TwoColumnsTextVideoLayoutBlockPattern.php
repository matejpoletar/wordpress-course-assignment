<?php

/**
 * File that holds base class for block pattern.
 *
 * @package EightshiftLibs\BlockPatterns
 */

declare(strict_types=1);

namespace InfinumAcademy\BlockPatterns;

use InfinumAcademyVendor\EightshiftLibs\BlockPatterns\AbstractBlockPattern;

/**
 * TwoColumnsTextVideoLayoutBlockPattern class.
 */
class TwoColumnsTextVideoLayoutBlockPattern extends AbstractBlockPattern
{
	/**
	 * Get the pattern categories.
	 *
	 * @return array<string> Array of categories.
	 */
	protected function getCategories(): array
	{
		return ['layout'];
	}

	/**
	 * Get the pattern keywords.
	 *
	 * @return array<string> Array of keywords.
	 */
	protected function getKeywords(): array
	{
		return ['layout', 'text', 'video'];
	}

	/**
	 * Get the pattern name with namespace.
	 * Example: eightshift/pattern-name
	 *
	 * @return string Pattern name.
	 */
	protected function getName(): string
	{
		return 'eightshift-boilerplate/two-columns-text-video-layout';
	}

	/**
	 * Get the pattern title that is shown in the pattern selector.
	 *
	 * @return string Pattern title.
	 */
	protected function getTitle(): string
	{
		return 'Two columns text video layout';
	}

	/**
	 * Get the pattern description.
	 *
	 * @return string Pattern description.
	 */
	protected function getDescription(): string
	{
		return 'Two column layout. Left column consists of heading, paragraph and a button. 
			Right column is placeholder for video content.';
	}

	/**
	 * Get the pattern content.
	 * NOTE: While returning the pattern content set it inside double quotes ("")
	 * to avoid formatting issues.
	 *
	 * @return string Pattern content.
	 */
	protected function getContent(): string
	{
		return '<!-- wp:eightshift-boilerplate/columns {"wrapperSpacingTopInLarge":60} -->
			<!-- wp:eightshift-boilerplate/column {"columnOffsetLarge":2} -->
			<!-- wp:eightshift-boilerplate/heading {"wrapperUseSimple":true} /-->
			
			<!-- wp:eightshift-boilerplate/paragraph {"wrapperUseSimple":true} /-->
			<!-- /wp:eightshift-boilerplate/column -->
			
			<!-- wp:eightshift-boilerplate/column {"columnWidthLarge":5,"columnOffsetLarge":7} -->
			<!-- wp:eightshift-boilerplate/video {"wrapperUseSimple":true} /-->
			<!-- /wp:eightshift-boilerplate/column -->
			<!-- /wp:eightshift-boilerplate/columns -->';
	}
}
