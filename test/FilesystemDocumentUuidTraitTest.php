<?php
declare(strict_types=1);
/**
 * This file contains the filesystem DocumentUuid trait test
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
 
/**
 * Filesystem DocumentUuid Trait test class
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class FilesystemDocumentUuidTraitTest extends TestCase
{
    public function testGetDocumentUuid()
    {
        $basePath = __dir__ . '/data';
        $expected = json_decode(file_get_contents($basePath . '/uuid-rest.json'));
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits\DocumentUuid'
        );
        $mock->basePath = $basePath;

        $this->assertEquals($expected, $mock->getDocumentUuid('rest'));
    }
}
