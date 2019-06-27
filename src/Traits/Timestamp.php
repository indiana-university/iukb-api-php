<?php
declare(strict_types=1);
/**
 * This file contains the Timestamp trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a timestamp
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Timestamp
{
    /** @var The given timestamp of this item */
    private $timestamp;
    
    /**
     * Get the timestamp for this item
     *
     * @return \DateTime The timestamp for this item
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }
    
    /**
     * Set the timestamp for this item
     *
     * @param string $input The timestamp for this time
     * @return object The instance of this object
     */
    public function setTimestamp(\DateTime $input)
    {
        $this->timestamp = $input;
        return $this;
    }
}
