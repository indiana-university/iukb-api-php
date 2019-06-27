<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Title trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the title trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class TitleTraitTest extends TestCase
{
    public function testSetTitle()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Title'
        );
        $this->assertIsObject(
            $mock->setTitle('test')
        );
    }
    
    public function badTitleDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badTitleDataProvider
     */
    public function testSetTitleWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Title'
        );
        $mock->setTitle($data);
    }
    
    /**
     * @depends testSetTitle
     */
    public function testGetTitle()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Title'
        );
        $mock->setTitle('test');
        $this->assertEquals('test', $mock->getTitle());
    }
}
