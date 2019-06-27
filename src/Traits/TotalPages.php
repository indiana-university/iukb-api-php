<?php
declare(strict_types=1);
/**
 * This file contains the TotalPages trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a totalPages
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait TotalPages
{
    /** @var The given totalPages of this item */
    private $totalPages;
    
    /**
     * Get the totalPages for this item
     *
     * @return int The totalPages for this item
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }
    
    /**
     * Set the totalPages for this item
     *
     * @param int $input The totalPages for this time
     * @return object The instance of this object
     */
    public function setTotalPages(int $input)
    {
        $this->totalPages = $input;
        return $this;
    }
}
