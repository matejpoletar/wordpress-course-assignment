<?php

/**
 * File holding the FetchBooksData class
 *
 * @package InfinumAcademy\RemoteRequest;
 */

 declare(strict_types=1);

 namespace InfinumAcademy\FetchDataAPI;

 /**
  * Class that will fetch the data from the Gutendex API
  *
  * Used API: https://gutendex.com/books/
  */
class FetchBooksData extends FetchData
{
	/**
	 * API URL
	 *
	 * @var string
	 */
	private const API_URL = 'https://gutendex.com/books/';

	/**
	 * Method that returns API url
	 */
	protected function getAPIUrl(): string
	{
		return self::API_URL;
	}
}
