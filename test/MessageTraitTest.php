<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Message trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the message trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class MessageTraitTest extends TestCase
{
    public function testSetMessage()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Message'
        );
        $this->assertIsObject(
            $mock->setMessage('test')
        );
    }
    
    public function badMessageDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badMessageDataProvider
     */
    public function testSetMessageWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Message'
        );
        $mock->setMessage($data);
    }
    
    /**
     * @depends testSetMessage
     */
    public function testGetMessage()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Message'
        );
        $mock->setMessage('test');
        $this->assertEquals('test', $mock->getMessage());
    }
}
