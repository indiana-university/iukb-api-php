<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Timestamp trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the timestamp trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class TimestampTraitTest extends TestCase
{
    public function testSetTimestamp()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Timestamp'
        );
        $this->assertIsObject(
            $mock->setTimestamp(new \DateTime())
        );
    }
    
    public function badTimestampDataProvider()
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
     * @dataProvider badTimestampDataProvider
     */
    public function testSetTimestampWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Timestamp'
        );
        $mock->setTimestamp($data);
    }
    
    /**
     * @depends testSetTimestamp
     */
    public function testGetTimestamp()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Timestamp'
        );
        $expected = new \DateTime();
        $mock->setTimestamp($expected);
        $this->assertEquals($expected, $mock->getTimestamp());
    }
}
