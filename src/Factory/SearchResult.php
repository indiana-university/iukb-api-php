<?php
declare(strict_types=1);
/**
 * This file contains the SearchResult factory class for the IU knowledge base api
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Factory;

use Edu\Iu\Uits\KnowledgeBase\SearchResult as SearchResultClass;

/**
 * This class is the SearchResult factory class for the knowledge base api
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class SearchResult
{
    /**
     * Create a search result class based on the json input and return it
     *
     * @param \stdClass $input A json input object
     * @return Edu\Iu\Uits\KnowledgeBase\SearchResult An instance of a search result class
     */
    public static function create(\stdClass $input): SearchResultClass
    {
        $searchResult = new SearchResultClass();
        $searchResult
            ->setDocid($input->docid)
            ->setTitle($input->title)
            ->setAudiences($input->audiences)
            ->setLastModified(new \DateTime($input->lastModified))
            ->setVisibility($input->visibility)
            ->setImportance($input->importance)
            ->setBirthDate(new \DateTime($input->birthDate))
            ->setApprovedDate(new \DateTime($input->approvedDate))
            ->setOwner($input->owner);
        return $searchResult;
    }
}
