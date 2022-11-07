<?php

/**
 * The file that holds the FetchRemoteData class
 *
 * @package InfinumAcademy\RemoteRequest;
 */

declare(strict_types=1);

namespace InfinumAcademy\RemoteRequest;

/**
 * FetchRemoteData class
 *
 * A wrapper around the native WordPress wp_remote_request().
 */
class WpRemoteDataFetch implements RemoteRequestInterface
{
	/**
	 * Implements interface function makeRequest
	 *
	 * @param string $url API url.
	 * @param array<string, string> $arguments arguments that are passed to remote request.
	 */
	public function makeRequest(string $url, array $arguments): string
	{
		$response = \wp_remote_request($url, $arguments);
		if (\is_wp_error($response)) {
			return \sprintf(
				/* translators: %1$s is replaced with error code and %2$s with error message */
				\esc_html__('Error happened while making remote request: %1$s %2$s.', 'infinum-academy'),
				$response->get_error_code(),
				$response->get_error_message()
			);
		}
		return \wp_remote_retrieve_body($response);
	}
}
