<?php
declare(strict_types=1);
/**
 * This file contains the Document UUID trait for the filesystem data provider
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Traits;

/**
 * This trait returns a predefined json object containing a static kb document
 * uuid
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait DocumentUuid
{
    /**
     * Get the uuid for the requested document
     *
     * @param string $docid The id of the document to get the uuid for
     * @return \stdClass A decoded json object
     */
    public function getDocumentUuid(string $docid): \stdClass
    {
        return json_decode(
            file_get_contents($this->basePath . '/uuid-' . $docid . '.json')
        );
    }
}
