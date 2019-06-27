<?php
declare(strict_types=1);
/**
 * This file contains the test(s) for the Search Result Factory class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
use Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;
use Edu\Iu\Uits\KnowledgeBase\Factory\SearchResult;

/**
 * This is the SearchResultFactory test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class TestSearchResultFactory extends TestCase
{
    public function testCreate()
    {
        $provider = new Filesystem(__dir__ . '/data');
        $results = $provider->getSearchResults('json');
        
        $searchResult = SearchResult::create(
            $results->content->pagedDocuments->content[1]
        );
        
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\SearchResult',
            $searchResult
        );
    }
}
