<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Importance trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the importance trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class ImportanceTraitTest extends TestCase
{
    public function testSetImportance()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Importance'
        );
        $this->assertIsObject((
            $mock->setImportance('test')
        ));
    }
    
    public function badImportanceDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badImportanceDataProvider
     */
    public function testSetImportanceWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Importance'
        );
        $mock->setImportance($data);
    }
    
    /**
     * @depends testSetImportance
     */
    public function testGetImportance()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Importance'
        );
        $mock->setImportance('test');
        $this->assertEquals('test', $mock->getImportance());
    }
}
