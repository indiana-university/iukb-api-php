<?php
declare(strict_types=1);
/**
 * This file contains the Version trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a version
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Version
{
    /** @var The given version of this item */
    private $version;
    
    /**
     * Get the version for this item
     *
     * @return int The version for this item
     */
    public function getVersion(): int
    {
        return $this->version;
    }
    
    /**
     * Set the version for this item
     *
     * @param int $input The version for this time
     * @return object The instance of this object
     */
    public function setVersion(int $input)
    {
        $this->version = $input;
        return $this;
    }
}
