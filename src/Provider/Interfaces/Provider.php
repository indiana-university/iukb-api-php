<?php
declare(strict_types=1);
/**
 * This file contains the Provider interface for the IU Knowledge Base API
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Interfaces;

/**
 * This is the provider interface
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
interface Provider
{
    public function getDocument(string $docid): \stdClass;
    public function getDocumentUuid(string $docid): \stdClass;
    public function getSearchResults(string $criteria, int $page = 0, int $pageSize = 15): \stdClass;
}
