<?php
declare(strict_types=1);
/**
 * This file contains the SearchResults trait for the filesystem data provider
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits;

/**
 * This trait returns a predefined json object containing the results for a
 * given search
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
            file_get_contents($this->basePath . '/search-' . $query . '.json')
        );
    }
}
