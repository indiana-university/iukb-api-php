<?php
declare(strict_types=1);
/**
 * This file contains the tests for the LastModified trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the lastModified trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class LastModifiedTraitTest extends TestCase
{
    public function testSetLastModified()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\LastModified'
        );
        $this->assertIsObject(
            $mock->setLastModified(new \DateTime())
        );
    }
    
    public function badLastModifiedDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null],
            ['test'],
        ];
    }
    
    /**
     * @dataProvider badLastModifiedDataProvider
     */
    public function testSetLastModifiedWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\LastModified'
        );
        $mock->setLastModified($data);
    }
    
    /**
     * @depends testSetLastModified
     */
    public function testGetLastModified()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\LastModified'
        );
        $expected = new \DateTime();
        $mock->setLastModified($expected);
        $this->assertEquals($expected, $mock->getLastModified());
    }
}
