<?php
declare(strict_types=1);
/**
 * This file contains the Document factory class for the IU knowledge base api
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Factory;

use Edu\Iu\Uits\KnowledgeBase\Document as DocumentClass;

/**
 * This class is the Document factory class for the knowledge base api
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Document
{
    /**
     * Create a document class based on the json input and return it
     *
     * @param \stdClass $input A json input object
     * @return Edu\Iu\Uits\KnowledgeBase\Document An instance of a document class based on the input
     */
    public static function create(\stdClass $input): DocumentClass
    {
        $document = new DocumentClass();
        $document
            ->setStatus($input->status)
            ->setMessage($input->message)
            ->setContent($input->content)
            ->setVersion($input->version)
            ->setUuid($input->uuid)
            ->setTimestamp(
                new \DateTime($input->timestamp)
            );
        return $document;
    }
}
