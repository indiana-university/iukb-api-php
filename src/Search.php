<?php
declare(strict_types=1);
/**
 * This file contains the Search class for the IU Knowledge Base
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase;

/**
 * This class represents a search in the IU knowledge base
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Search
{
    use Traits\Status;
    use Traits\Message;
    use Traits\Version;
    use Traits\Timestamp;
    use Traits\TotalResults;
    use Traits\TotalPages;
    use Traits\FirstPage;
    use Traits\LastPage;
    use Traits\Results;
}
