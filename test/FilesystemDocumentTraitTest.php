<?php
declare(strict_types=1);
/**
 * This file contains the filesystem Document trait test
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
 
/**
 * Filesystem Document Trait test class
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class FilesystemDocumentTraitTest extends TestCase
{
    public function testGetDocument()
    {
        $basePath = __dir__ . '/data';

        $expected = json_decode(file_get_contents($basePath . '/rest.json'));
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits\Document'
        );

        $mock->basePath = $basePath;
        $this->assertEquals($expected, $mock->getDocument('rest'));
    }
}
