<?php
declare(strict_types=1);
/**
 * This file contains the filesystem provider test
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use PHPUnit\Framework\TestCase;
use \Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;
 
/**
 * Filesystem Provider test class
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class FilesystemProviderTest extends TestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem',
            new Filesystem(__dir__ . '/data')
        );
    }
}
