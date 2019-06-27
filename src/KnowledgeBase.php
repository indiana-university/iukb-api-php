<?php
declare(strict_types=1);
/**
 * This file contains the main Knowledge base class for the IU KB API
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase;

use \Edu\Iu\Uits\KnowledgeBase\Document;
use \Edu\Iu\Uits\KnowledgeBase\DocumentUuid;
use \Edu\Iu\Uits\KnowledgeBase\Factory\Document as DocumentFactory;
use \Edu\Iu\Uits\KnowledgeBase\Factory\DocumentUuid as DocumentUuidFactory;
use \Edu\Iu\Uits\KnowledgeBase\Factory\Search as SeachFactory;
use \Edu\Iu\Uits\KnowledgeBase\Provider\Interfaces\Provider;

/**
 * This is the main Knowledge Base class.
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class KnowledgeBase
{
    /** @var Provider The provider to use for data */
    private $provider;
    
    /**
     * Constructor
     *
     * @param \Edu\Iu\Uits\KnowledgeBase\Provider\Interfaces\Provider $provider The data provider to use
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }
    
    /**
     * Get a knowledge base document
     *
     * @param string $docid The id of the document
     * @return \Edu\Iu\Uits\KnowledgeBase\Document The requested document
     */
    public function getDocument(string $docid): Document
    {
        return DocumentFactory::create(
            $this->provider->getDocument($docid)
        );
    }
    
    /**
     * Get the Uuid of a knowledge base document
     *
     * @param string $docid The id of the document
     * @return \Edu\Iu\Uits\KnowledgeBase\DocumentUuid The requested document uuid
     */
    public function getDocumentUuid(string $docid): DocumentUuid
    {
        return DocumentUuidFactory::create(
            $this->provider->getDocumentUuid($docid)
        );
    }
    
    /**
     * Get the results of a search on the kb
     *
     * @param string $query The query to run
     * @param int $page The page number to get (default: 0)
     * @param int $pageSize The number of results per page (default: 15)
     * @return \Edu\Iu\Uits\KnowledgeBase\Search The requested search
     */
    public function getSearch(string $query, $page = 0, $pageSize = 15): Search
    {
        return SeachFactory::create(
            $this->provider->getSearchResults($query, $page, $pageSize)
        );
    }
}
