<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Uuid trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the uuid trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class UuidTraitTest extends TestCase
{
    public function testSetUuid()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Uuid'
        );
        $this->assertIsObject(
            $mock->setUuid('test')
        );
    }
    
    public function badUuidDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badUuidDataProvider
     */
    public function testSetUuidWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Uuid'
        );
        $mock->setUuid($data);
    }
    
    /**
     * @depends testSetUuid
     */
    public function testGetUuid()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Uuid'
        );
        $mock->setUuid('test');
        $this->assertEquals('test', $mock->getUuid());
    }
}
