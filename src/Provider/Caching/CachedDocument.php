<?php
declare(strict_types=1);
/**
 * This file contains the CachedDocument class for the IU KB API
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Provider\Caching;

use Edu\Iu\Uits\KnowledgeBase\Document;

class CachedDocument
{
    /** @var Document The KB Document to cache */
    private $document;

    /** @var string The UUID of the Cached Document */
    private $uuid;

    /** @var \DateTime When the document was checked for updates */
    private $lastChecked;

    /** @var int The time elapsed before a document needs checked again */
    private $ttl;

    /**
     * Get whether or not the document needs to be rechecked
     * @return bool
     * @throws \Exception
     */
    public function isStale(): bool
    {
        $expirationDate = (int)$this->lastChecked->format('U') + $this->ttl;
        $now = strtotime('now');

        if ($expirationDate <= $now) {
            return true;
        }

        return false;
    }

    /**
     * @return \stdClass
     */
    public function getDocument(): \stdClass
    {
        return $this->document;
    }

    /**
     * @param \stdClass $document
     * @return CachedDocument
     */
    public function setDocument(\stdClass $document): CachedDocument
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return CachedDocument
     */
    public function setUuid(string $uuid): CachedDocument
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastChecked(): \DateTime
    {
        return $this->lastChecked;
    }

    /**
     * @param \DateTime $lastChecked
     * @return CachedDocument
     */
    public function setLastChecked(\DateTime $lastChecked): CachedDocument
    {
        $this->lastChecked = $lastChecked;
        return $this;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @param int $ttl
     * @return CachedDocument
     */
    public function setTtl(int $ttl): CachedDocument
    {
        $this->ttl = $ttl;
        return $this;
    }
}
