<?php
declare(strict_types=1);
/**
 * This file contains the Importance trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents an importance
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Importance
{
    /** @var The given importance of this item */
    private $importance;
    
    /**
     * Get the importance for this item
     *
     * @return string The importance for this item
     */
    public function getImportance(): string
    {
        return $this->importance;
    }
    
    /**
     * Set the importance for this item
     *
     * @param string $input The importance for this time
     * @return object The instance of this object
     */
    public function setImportance(string $input)
    {
        $this->importance = $input;
        return $this;
    }
}
