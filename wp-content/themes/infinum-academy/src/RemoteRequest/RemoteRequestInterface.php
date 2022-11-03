<?php

/**
 * File holding the Remote Request Interface
 *
 * @package InfinumAcademy\RemoteRequest;
 */

declare(strict_types=1);

namespace InfinumAcademy\RemoteRequest;

/**
 * RemoteRequest interface
 */
interface RemoteRequestInterface
{
	/**
	 * Interface function makeRequest
	 *
	 * @param string $url API url.
	 * @param array<string, string> $arguments arguments that are passed to remote request.
	 */
	public function makeRequest(string $url, array $arguments): string;
}
