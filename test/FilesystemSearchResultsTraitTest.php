<?php
declare(strict_types=1);
/**
 * This file contains the filesystem SearchResults trait test
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
 
/**
 * Filesystem SearchResults Trait test class
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class FilesystemSearchResultsTraitTest extends TestCase
{
    protected function setUp(): void
    {
        $this->basePath = __dir__ . '/data';
    }

    public function testGetDocumentUuid()
    {
        $basePath = __dir__ . '/data';

        $expected = json_decode(file_get_contents($basePath . '/search-json.json'));
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits\SearchResults'
        );
        $mock->basePath = $basePath;
        $this->assertEquals($expected, $mock->getSearchResults('json'));
    }
}
