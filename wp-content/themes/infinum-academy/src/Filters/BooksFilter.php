<?php

/**
 * The file that is an BooksFilter class.
 *
 * @package InfinumAcademy\Filters;
 */

declare(strict_types=1);

namespace InfinumAcademy\Filters;

use InfinumAcademyVendor\EightshiftLibs\Services\ServiceInterface;
use InfinumAcademyVendor\EightshiftLibs\Rest\RouteInterface;

/**
 * BooksFilter class.
 */
class BooksFilter implements ServiceInterface
{
	public const BOOKS_FILTER = 'books_filter';

	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_filter(self::BOOKS_FILTER, [$this, 'featuredBooksData'], 10);
	}

	/**
	 * Callback for books filter.
	 *
	 * @param array<mixed> $data Data passed to callback.
	 * @return array<mixed> $results
	 */
	public function featuredBooksData($data = []): array
	{
		// Fetch the data using WP_REST_Request.
		$request = new \WP_REST_Request(RouteInterface::READABLE, '/InfinumAcademy/v1/books');  // phpcs:ignore SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly.ReferenceViaFullyQualifiedName
		$response = \rest_do_request($request);
		if ($response->is_error()) {
			$error = $response->as_error();
			$message = $error->get_error_message();
			$errorData = $error->get_error_data();

			// translators: %1$s message %2$d error data.
			return [\printf(\esc_html__('API data return an error: %1$s %2$d', 'infinum-academy'), $message, $errorData)];  // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
		}
		$data = (array) $response->get_data();
		$results = (array) $data['results'];
		return $results;
	}
}
