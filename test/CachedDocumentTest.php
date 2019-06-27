<?php
declare(strict_types=1);
/**
 * This file contains the tests for the CachedDocument class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use Edu\Iu\Uits\KnowledgeBase\Provider\Caching\CachedDocument;
use PHPUnit\Framework\TestCase;

class CachedDocumentTest extends TestCase
{
    public function testIsStale()
    {
        $doc = new CachedDocument();
        $doc->setTtl(3600);
        $doc->setLastChecked(new \DateTime('now'));
        $this->assertFalse($doc->isStale());

        $doc->setLastChecked(new \DateTime('-1 day'));
        $this->assertTrue($doc->isStale());

        $doc->setLastChecked(new \DateTime('-3599 seconds'));
        $this->assertFalse($doc->isStale());

        $doc->setLastChecked(new \DateTime('-3601 seconds'));
        $this->assertTrue($doc->isStale());
    }

    public function testGetTtl()
    {
        $doc = new CachedDocument();
        $doc->setTtl(1234);
        $this->assertEquals(
            1234,
            $doc->getTtl()
        );
    }
}
