<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Version trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the version trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class VersionTraitTest extends TestCase
{
    public function testSetVersion()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Version'
        );
        $this->assertIsObject(
            $mock->setVersion(0)
        );
    }
    
    public function badVersionDataProvider()
    {
        return [
            [true],
            [new \DateTime()],
            ['987'],
            ['banana'],
            [3.14159],
            [null],
        ];
    }
    
    /**
     * @dataProvider badVersionDataProvider
     */
    public function testSetVersionWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Version'
        );
        $mock->setVersion($data);
    }
    
    /**
     * @depends testSetVersion
     */
    public function testGetVersion()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Version'
        );
        $mock->setVersion(0);
        $this->assertEquals(0, $mock->getVersion());
    }
}
