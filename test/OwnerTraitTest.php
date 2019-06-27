<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Owner trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the owner trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class OwnerTraitTest extends TestCase
{
    public function testSetOwner()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Owner'
        );
        $this->assertIsObject(
            $mock->setOwner('test')
        );
    }
    
    public function badOwnerDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badOwnerDataProvider
     */
    public function testSetOwnerWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Owner'
        );
        $mock->setOwner($data);
    }
    
    /**
     * @depends testSetOwner
     */
    public function testGetOwner()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Owner'
        );
        $mock->setOwner('test');
        $this->assertEquals('test', $mock->getOwner());
    }
}
