<?php
declare(strict_types=1);
/**
 * This file contains the web provider class for the IU Knowledge base
 * api
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Provider\Web;

use GuzzleHttp\Client;
use Edu\Iu\Uits\KnowledgeBase\Provider\Interfaces\Provider as ProviderInterface;

/**
 * This class fetches responses from the knowledge base rest api and returns
 * the response
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Web implements ProviderInterface
{
    use Traits\Document;
    use Traits\DocumentUuid;
    use Traits\SearchResults;
    
    /** @var \GuzzleHttp\Client The base uri for the rest api */
    private $client;
    
    /**
     * Constructor
     *
     * @param string $baseUri The base uri of the rest api
     * @param string $username The username for the rest api
     * @param string $password The password for the username
     */
    public function __construct(string $baseUri, string $username, string $password)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            'auth' => [$username, $password],
            'headers' => [
                'User-Agent' => 'IU-PHP-KB-API',
                'Accept' => 'application/json'
            ]
        ]);
    }
}
