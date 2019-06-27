<?php
declare(strict_types=1);
/**
 * This file contains the Test Search Factory Test(s)
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
use Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;
use Edu\Iu\Uits\KnowledgeBase\Factory\Search;

class TestSearchFactory extends TestCase
{
    public function testCreate()
    {
        $provider = new Filesystem(__dir__ . '/data');
        $results = Search::create($provider->getSearchResults('json'));
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\Search',
            $results
        );
    }
}
