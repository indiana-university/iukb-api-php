<?php
declare(strict_types=1);
/**
 * This file contains the tests for the ApprovedDate trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the approvedDate trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class ApprovedDateTraitTest extends TestCase
{
    public function testSetApprovedDate()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\ApprovedDate'
        );
        $this->assertIsObject(
            $mock->setApprovedDate(new \DateTime())
        );
    }

    public function badApprovedDateDataProvider()
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
     * @dataProvider badApprovedDateDataProvider
     */
    public function testSetApprovedDateWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\ApprovedDate'
        );
        $mock->setApprovedDate($data);
    }
    
    /**
     * @depends testSetApprovedDate
     */
    public function testGetApprovedDate()
    {
        $expected = new \DateTime();
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\ApprovedDate'
        );
        $mock->setApproveddate($expected);
        $this->assertEquals($expected, $mock->getApprovedDate());
    }
}
