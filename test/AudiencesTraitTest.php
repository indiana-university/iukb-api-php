<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Audiences trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the audiences trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class AudiencesTraitTest extends TestCase
{
    public function testSetAudiences()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Audiences'
        );
        $this->assertIsObject(
            $mock->setAudiences(['test'])
        );
    }
    
    public function badAudiencesDataProvider()
    {
        return [
            [true],
            [987],
            [3.14159],
            [null]
        ];
    }
    
    /**
     * @dataProvider badAudiencesDataProvider
     */
    public function testSetAudiencesWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Audiences'
        );
        $mock->setAudiences($data);
    }
    
    /**
     * @depends testSetAudiences
     */
    public function testGetAudiences()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\Audiences'
        );
        $mock->setAudiences(['test']);
        $this->assertEquals(['test'], $mock->getAudiences());
    }
}
