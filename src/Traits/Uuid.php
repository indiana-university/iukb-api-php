<?php
declare(strict_types=1);
/**
 * This file contains the Uuid trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a uuid
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Uuid
{
    /** @var The given uuid of this item */
    private $uuid;
    
    /**
     * Get the uuid for this item
     *
     * @return string The uuid for this item
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
    
    /**
     * Set the uuid for this item
     *
     * @param string $input The uuid for this time
     * @return object The instance of this object
     */
    public function setUuid(string $input)
    {
        $this->uuid = $input;
        return $this;
    }
}
