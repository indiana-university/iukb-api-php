<?php
declare(strict_types=1);
/**
 * This file contains the Results trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

use Edu\Iu\Uits\KnowledgeBase\SearchResult;

/**
 * This trait represents an results
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Results
{
    /** @var The given results of this item */
    private $results;
    
    /**
     * Get the results for this item
     *
     * @return array The results for this item
     */
    public function getResults(): array
    {
        return $this->results;
    }
    
    /**
     * Set the results for this item
     *
     * @param array $input The results for this time
     * @return object The instance of this object
     */
    public function setResults(array $input)
    {
        $this->results = $input;
        return $this;
    }
    
    /**
     * Add a result to this item
     *
     * @param Edu\Iu\Uits\KnowledgeBase\SearchResult $result The result to add
     * @return object The instance of this object
     */
    public function addResult(SearchResult $result)
    {
        $this->results[] = $result;
        return $this;
    }
}
