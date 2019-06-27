<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Content trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the content trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class ContentTraitTest extends TestCase
{
    use \Edu\Iu\Uits\KnowledgeBase\Traits\Content;
    
    public function testSetContent()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Content'
        );
        $this->assertIsObject(
            $mock->setContent('test')
        );
    }
    
    public function badContentDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badContentDataProvider
     */
    public function testSetContentWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Content'
        );
        $mock->setContent($data);
    }
    
    /**
     * @depends testSetContent
     */
    public function testGetContent()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Content'
        );
        $mock->setContent('test');
        $this->assertEquals('test', $mock->getContent());
    }
}
