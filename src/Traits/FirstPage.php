<?php
declare(strict_types=1);
/**
 * This file contains the FirstPage trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a firstPage
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait FirstPage
{
    /** @var The given firstPage of this item */
    private $firstPage;
    
    /**
     * Get the firstPage for this item
     *
     * @return bool The firstPage for this item
     */
    public function getFirstPage(): bool
    {
        return $this->firstPage;
    }
    
    /**
     * Set the firstPage for this item
     *
     * @param bool $input The firstPage for this time
     * @return object The instance of this object
     */
    public function setFirstPage(bool $input)
    {
        $this->firstPage = $input;
        return $this;
    }
}
