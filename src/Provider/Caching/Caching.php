<?php
declare(strict_types=1);
/**
 * This file contains the caching provider for the KB API
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Provider\Caching;

use \Doctrine\Common\Cache\Cache;
use \Edu\Iu\Uits\KnowledgeBase\Provider\Interfaces\Provider;

class Caching implements Provider
{
    /** @var Provider The provider to use to pull data */
    private $provider;

    /** @var Cache The given cache to use to store data */
    private $cache;

    /** @var int The time a cached entry should live before being rechecked */
    private $ttl;

    /**
     * Caching constructor.
     * @param Provider $provider A provider that follows the Provider Interface
     * @param Cache $cache An instance of a Doctrine cache class
     * @param int $ttl Time to wait before rechecking a cached entry (3600)
     */
    public function __construct(Provider $provider, Cache $cache, int $ttl = 3600)
    {
        $this->provider = $provider;
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    /**
     * @param string $docid
     * @return \stdClass
     * @throws \Exception
     */
    public function getDocument(string $docid): \stdClass
    {
        if (!$this->cache->contains($docid)) {
            $this->pullDocumentIntoCache($docid);
        } elseif ($this->cache->fetch($docid)->isStale()) {
            $currentUuid = $this->getDocumentUuid($docid);
            $doc = $this->cache->fetch($docid);

            if ($doc->getUuid() != $currentUuid->uuid) {
                $this->pullDocumentIntoCache($docid);
            }
        }

        return $this->pullDocumentFromCache($docid);
    }

    /**
     * @param string $docid
     * @return \stdClass
     */
    public function getDocumentUuid(string $docid): \stdClass
    {
        return $this->provider->getDocumentUuid($docid);
    }

    /**
     * @param string $criteria
     * @param int $page
     * @param int $pageSize
     * @return \stdClass
     * @throws \Exception
     */
    public function getSearchResults(string $criteria, int $page = 0, int $pageSize = 15): \stdClass
    {
        $searchName = $criteria . '_' . $page . '_' . $pageSize;

        if (!$this->cache->contains('searchName') ||
            $this->cache->fetch($searchName)->isStale()
        ) {
            $this->pullSearchResultsIntoCache($criteria, $page, $pageSize);
        }

        return $this->pullSearchResultsFromCache($searchName);
    }

    /**
     * Get a document from given provider and store it in the cache
     *
     * @param string $docid
     * @throws \Exception
     */
    private function pullDocumentIntoCache(string $docid): void
    {
        $document = $this->provider->getDocument($docid);

        $cachedDocument = new CachedDocument();
        $cachedDocument
            ->setLastChecked(new \DateTime('now'))
            ->setTtl($this->ttl)
            ->setDocument($document)
            ->setUuid($document->uuid);

        $this->cache->save($docid, $cachedDocument);

        return;
    }

    /**
     * Get a cached document
     *
     * @param string $docid
     * @return \stdClass
     */
    private function pullDocumentFromCache(string $docid): \stdClass
    {
        return $this->cache->fetch($docid)->getDocument();
    }

    /**
     * Run a search through provider and store the results in the cache
     *
     * @param string $criteria
     * @param int $page
     * @param int $pageSize
     * @throws \Exception
     */
    private function pullSearchResultsIntoCache(string $criteria, int $page = 0, int $pageSize = 15)
    {
        $searchName = $criteria . '_' . $page . '_' . $pageSize;
        $results = $this->provider->getSearchResults($criteria, $page, $pageSize);

        $cachedDocument = new CachedDocument();
        $cachedDocument
            ->setLastChecked(new \DateTime('now'))
            ->setTtl($this->ttl)
            ->setDocument($results);

        $this->cache->save($searchName, $cachedDocument);

        return;
    }

    /**
     * Get a cached search result
     *
     * @param string $searchName
     * @return \stdClass
     */
    private function pullSearchResultsFromCache(string $searchName): \stdClass
    {
        return $this->cache->fetch($searchName)->getDocument();
    }
}
