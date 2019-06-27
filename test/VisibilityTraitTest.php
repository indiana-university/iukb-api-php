<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Visibility trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the visibility trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class VisibilityTraitTest extends TestCase
{
    public function testSetVisibility()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Visibility'
        );
        $this->assertIsObject(
            $mock->setVisibility('test')
        );
    }
    
    public function badVisibilityDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badVisibilityDataProvider
     */
    public function testSetVisibilityWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Visibility'
        );
        $mock->setVisibility($data);
    }
    
    /**
     * @depends testSetVisibility
     */
    public function testGetVisibility()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Visibility'
        );
        $mock->setVisibility('test');
        $this->assertEquals('test', $mock->getVisibility());
    }
}
