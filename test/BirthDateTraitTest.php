<?php
declare(strict_types=1);
/**
 * This file contains the tests for the BirthDate trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Test;

use \PHPUnit\Framework\TestCase;

/**
 * This is the birthDate trait test
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class BirthDateTraitTest extends TestCase
{
    public function testSetBirthDate()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\BirthDate'
        );
        $this->assertIsObject(
            $mock->setBirthDate(new \DateTime())
        );
    }
    
    public function badBirthDateDataProvider()
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
     * @dataProvider badBirthDateDataProvider
     */
    public function testSetBirthDateWithBadData($data)
    {
        $this->expectException(\TypeError::class);
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\BirthDate'
        );
        $mock->setBirthDate($data);
    }
    
    /**
     * @depends testSetBirthDate
     */
    public function testGetBirthDate()
    {
        $mock = $this->getMockForTrait(
            '\Edu\Iu\Uits\KnowledgeBase\Traits\BirthDate'
        );
        $expected = new \DateTime();
        $mock->setBirthDate($expected);
        $this->assertEquals($expected, $mock->getBirthDate());
    }
}
