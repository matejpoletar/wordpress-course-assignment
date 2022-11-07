<?php

/**
 * File holding the FetchGalleryData class
 *
 * @package InfinumAcademy\RemoteRequest;
 */

declare(strict_types=1);

namespace InfinumAcademy\FetchDataAPI;

use InfinumAcademy\RemoteRequest\RemoteRequestInterface;

/**
 * Class that mocks up fetching of data from an API
 */
abstract class FetchData
{
	/**
	 * Remote request interface
	 *
	 * @var RemoteRequestInterface $wpRemoteDataFetch Remote request interface.
	 */
	private RemoteRequestInterface $wpRemoteDataFetch;

	/**
	 * Constructor for FetchData class
	 *
	 * @param RemoteRequestInterface $wpRemoteDataFetch Remote request interface.
	 */
	public function __construct(RemoteRequestInterface $wpRemoteDataFetch)
	{
		$this->wpRemoteDataFetch = $wpRemoteDataFetch;
	}

	/**
	 * Get data from an API.
	 */
	public function getData(): string
	{
		$response = $this->wpRemoteDataFetch->makeRequest($this->getAPIUrl(), [
			'Content-Type' => 'application/json',
		]);
		return $response;
	}

	/**
	 * Get API url.
	 */
	abstract protected function getAPIUrl(): string;
}
