<?php
declare(strict_types=1);
/**
 * This file contains the TotalResults trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a totalResults
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait TotalResults
{
    /** @var The given totalResults of this item */
    private $totalResults;
    
    /**
     * Get the totalResults for this item
     *
     * @return int The totalResults for this item
     */
    public function getTotalResults(): int
    {
        return $this->totalResults;
    }
    
    /**
     * Set the totalResults for this item
     *
     * @param int $input The totalResults for this time
     * @return object The instance of this object
     */
    public function setTotalResults(int $input)
    {
        $this->totalResults = $input;
        return $this;
    }
}
