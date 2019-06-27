<?php
declare(strict_types=1);
/**
 * This file contains the Document UUID class for the IU Knowledge Base
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase;

/**
 * This class represents a document uuid in the IU knowledge base
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class DocumentUuid
{
    use Traits\Status;
    use Traits\Message;
    use Traits\Uuid;
    use Traits\Version;
    use Traits\Timestamp;
}
