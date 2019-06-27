<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Status trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the status trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class StatusTraitTest extends TestCase
{
    public function testSetStatus()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Status'
        );
        $this->assertTrue(is_object($mock->setStatus('test')));
    }

    public function badStatusDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badStatusDataProvider
     */
    public function testSetStatusWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Status'
        );
        $mock->setStatus($data);
    }

    /**
     * @depends testSetStatus
     * @throws \ReflectionException
     */
    public function testGetStatus()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Status'
        );
        $mock->setStatus('test');
        $this->assertEquals('test', $mock->getStatus());
    }
}
