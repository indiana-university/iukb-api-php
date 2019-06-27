<?php
declare(strict_types=1);
/**
 * This file contains the SearchResults trait for the web data provider
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Web\Traits;

/**
 * This trait returns a json object containing the results for a given search
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait SearchResults
{
    /**
     * Get the results for a given search query
     *
     * @param string $query The query to get results for
     * @param int $page The page number (default: 0)
     * @param int $pageSize The number of results per page (default: 15)
     * @return \stdClass A decoded json object
     */
    public function getSearchResults(string $query, int $page = 0, int $pageSize = 15): \stdClass
    {
        return json_decode(
            (string)$this->client->request(
                'GET',
                '/v0/search?q=' . $query . '&page=' . $page . '&pageSize=' . $pageSize
            )->getBody()
        );
    }
}
