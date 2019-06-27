<?php
declare(strict_types=1);
/**
 * This file contains the tests for the iu knowledge base class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
use Edu\Iu\Uits\KnowledgeBase\KnowledgeBase;
use Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;
use Doctrine\Common\Cache\ArrayCache;

class TestKnowledgeBase extends TestCase
{
    
    public function testConstruct()
    {
        $kb = new KnowledgeBase(
            new Filesystem(__dir__ . '/data'),
            new ArrayCache()
        );
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\KnowledgeBase',
            $kb
        );
    }
    
    public function testGetDocument()
    {
        $kb = new KnowledgeBase(
            new Filesystem(__dir__ . '/data'),
            new ArrayCache()
        );
        
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\Document',
            $kb->getDocument('rest')
        );
    }
    
    public function testGetDocumentUuid()
    {
        $kb = new KnowledgeBase(
            new Filesystem(__dir__ . '/data'),
            new ArrayCache()
        );
        
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\DocumentUuid',
            $kb->getDocumentUuid('rest')
        );
    }
}
