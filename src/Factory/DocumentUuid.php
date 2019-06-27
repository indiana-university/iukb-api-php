<?php
declare(strict_types=1);
/**
 * This file contains the DocumentUuid factory class for the IU knowledge base
 * api
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Factory;

use Edu\Iu\Uits\KnowledgeBase\DocumentUuid as DocumentUuidClass;

/**
 * This class is the Document Uuid factory class for the knowledge base api
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class DocumentUuid
{
    /**
     * Create a document uuid class based on the json input and return it
     *
     * @param \stdClass $input A json input object
     * @return Edu\Iu\Uits\KnowledgeBase\DocumentUuid An instance of a document uuid class
     */
    public static function create(\stdClass $input): DocumentUuidClass
    {
        $uuid = new DocumentUuidClass();
        $uuid
            ->setStatus($input->status)
            ->setMessage($input->message)
            ->setUuid($input->uuid)
            ->setVersion($input->version)
            ->setTimestamp(
                new \DateTime($input->timestamp)
            );
        return $uuid;
    }
}
