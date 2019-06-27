<?php
declare(strict_types=1);
/**
 * This file contains the Document trait for the filesystem data provider
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits;

/**
 * This trait returns a predefined json object containing a static kb document
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Document
{
    /**
     * Get the requested document
     *
     * @param string $docid The id of the document to get
     * @return \stdClass A decoded json object
     */
    public function getDocument(string $docid): \stdClass
    {
        return json_decode(
            file_get_contents($this->basePath . '/' . $docid . '.json')
        );
    }
}
