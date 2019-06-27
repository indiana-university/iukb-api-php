<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Docid trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the docid trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class DocidTraitTest extends TestCase
{
    public function testSetDocid()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Docid'
        );
        $this->assertIsObject(
            $mock->setDocid('test')
        );
    }
    
    public function badDocidDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badDocidDataProvider
     */
    public function testSetDocidWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Docid'
        );
        $mock->setDocid($data);
    }
    
    /**
     * @depends testSetDocid
     */
    public function testGetDocid()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Docid'
        );
        $mock->setDocid('test');
        $this->assertEquals('test', $mock->getDocid());
    }
}
