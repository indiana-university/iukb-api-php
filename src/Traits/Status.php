<?php
declare(strict_types=1);
/**
 * This file contains the Status trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a status
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Status
{
    /** @var The given status of this item */
    private $status;
    
    /**
     * Get the status for this item
     *
     * @return string The status for this item
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    
    /**
     * Set the status for this item
     *
     * @param string $input The status for this time
     * @return object The instance of this object
     */
    public function setStatus(string $input)
    {
        $this->status = $input;
        return $this;
    }
}
