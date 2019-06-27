<?php
declare(strict_types=1);
/**
 * This file contains the SearchResult class for the IU Knowledge Base API
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase;

/**
 * This class represents a search result from the kb rest api
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class SearchResult
{
    use Traits\Docid;
    use Traits\Title;
    use Traits\Audiences;
    use Traits\LastModified;
    use Traits\Visibility;
    use Traits\Importance;
    use Traits\BirthDate;
    use Traits\ApprovedDate;
    use Traits\Owner;
}
