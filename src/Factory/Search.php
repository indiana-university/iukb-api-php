<?php
declare(strict_types=1);
/**
 * This file contains the SearchResults factory class for the IU knowledge base api
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Factory;

use Edu\Iu\Uits\KnowledgeBase\Factory\SearchResult;
use Edu\Iu\Uits\KnowledgeBase\Search as SearchClass;

/**
 * This class is the Search factory class for the knowledge base api
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Search
{
    /**
     * Create a search class based on the json input and return it
     *
     * @param \stdClass $input A json input object
     * @return Edu\Iu\Uits\KnowledgeBase\Search An instance of a search results class
     */
    public static function create(\stdClass $input): SearchClass
    {
        $search = new SearchClass();
        $search
            ->setStatus($input->status)
            ->setMessage($input->message)
            ->setVersion($input->version)
            ->setTimestamp(new \DateTime($input->timestamp))
            ->setTotalResults($input->content->pagedDocuments->numberOfElements)
            ->setTotalPages($input->content->pagedDocuments->totalPages)
            ->setFirstPage($input->content->pagedDocuments->firstPage)
            ->setLastPage($input->content->pagedDocuments->lastPage);
            
        foreach ($input->content->pagedDocuments->content as $hit) {
            $search->addResult(
                SearchResult::create($hit)
            );
        }
        
        return $search;
    }
}
