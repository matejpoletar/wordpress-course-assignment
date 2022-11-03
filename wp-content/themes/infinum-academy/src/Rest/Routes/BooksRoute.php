<?php

/**
 * The class register route for $className endpoint
 *
 * @package InfinumAcademy\Rest\Routes
 */

declare(strict_types=1);

namespace InfinumAcademy\Rest\Routes;

use InfinumAcademy\FetchDataAPI\FetchBooksData;
use InfinumAcademy\Config\Config;
use InfinumAcademyVendor\EightshiftLibs\Rest\Routes\AbstractRoute;
use InfinumAcademyVendor\EightshiftLibs\Rest\CallableRouteInterface;
use WP_REST_Request;

/**
 * Class BooksRoute
 */
class BooksRoute extends AbstractRoute implements CallableRouteInterface
{
	/**
	 * Fetch data class
	 *
	 * @var FetchBooksData $fetchBooksData Fetch data class
	 */
	private FetchBooksData $fetchBooksData;

	/**
	 * Class constructor
	 *
	 * @param FetchBooksData $fetchBooksData Fetch data class.
	 */
	public function __construct(FetchBooksData $fetchBooksData)
	{
		$this->fetchBooksData = $fetchBooksData;
	}

	/**
	 * Method that returns project Route namespace.
	 *
	 * @return string Project namespace InfinumAcademyVendor\for REST route.
	 */
	protected function getNamespace(): string
	{
		return Config::getProjectRoutesNamespace();
	}

	/**
	 * Method that returns project route version.
	 *
	 * @return string Route version as a string.
	 */
	protected function getVersion(): string
	{
		return Config::getProjectRoutesVersion();
	}

	/**
	 * Get the base url of the route
	 *
	 * @return string The base URL for route you are adding.
	 */
	protected function getRouteName(): string
	{
		return '/books';
	}

	/**
	 * Get callback arguments array
	 *
	 * @return array<mixed> Either an array of options for the endpoint, or an array of arrays for multiple methods.
	 */
	protected function getCallbackArguments(): array
	{
		return [
			'methods' => static::READABLE,
			'callback' => [$this, 'routeCallback'],
			'permission_callback' => '__return_true'
		];
	}

	/**
	 * Method that returns rest response
	 *
	 * @param WP_REST_Request $request Data got from endpoint url.
	 *
	 * @return WP_REST_Response|mixed If response generated an error, WP_Error, if response
	 *                                is already an instance, WP_HTTP_Response, otherwise
	 *                                returns a new WP_REST_Response instance.
	 */
	public function routeCallback(WP_REST_Request $request)
	{
		$response = $this->fetchBooksData->getData();

		return \rest_ensure_response(\json_decode($response));
	}
}
