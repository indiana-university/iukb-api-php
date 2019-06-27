<?php
declare(strict_types=1);
/**
 * This file contains the LastPage trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a lastPage
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait LastPage
{
    /** @var The given lastPage of this item */
    private $lastPage;
    
    /**
     * Get the lastPage for this item
     *
     * @return bool The lastPage for this item
     */
    public function getLastPage(): bool
    {
        return $this->lastPage;
    }
    
    /**
     * Set the lastPage for this item
     *
     * @param bool $input The lastPage for this time
     * @return object The instance of this object
     */
    public function setLastPage(bool $input)
    {
        $this->lastPage = $input;
        return $this;
    }
}
