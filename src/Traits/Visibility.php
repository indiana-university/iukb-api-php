<?php
declare(strict_types=1);
/**
 * This file contains the Visibility trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a visibility
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Visibility
{
    /** @var The given visibility of this item */
    private $visibility;
    
    /**
     * Get the visibility for this item
     *
     * @return string The visibility for this item
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }
    
    /**
     * Set the visibility for this item
     *
     * @param string $input The visibility for this time
     * @return object The instance of this object
     */
    public function setVisibility(string $input)
    {
        $this->visibility = $input;
        return $this;
    }
}
