<?php
declare(strict_types=1);
/**
 * This file contains the Document class for the IU Knowledge Base
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase;

/**
 * This class represents a document in the IU knowledge base
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Document
{
    use Traits\Status;
    use Traits\Message;
    use Traits\Content;
    use Traits\Version;
    use Traits\Uuid;
    use Traits\Timestamp;
}
