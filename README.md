# iukb-php-api
A set of classes to pull documents from the IU knowledge base into your PHP application

## Requirements
* PHP 7.1+
* Composer
* A knowledge base REST account
    * See [the knowledge base REST api documentation](https://kb.iu.edu/d/rest)
    for more information
    
## Usage
To instantiate the KB class, you must simply give it a provider. This is an
instance of a class which will pull KB data from somewhere and feed it into the
main KB class. There are currently three different providers, however, one of
them is simply an intermediary class to provide caching. The two actual data
providers are `Filesystem` and `Web`.

### Filesystem
The `Filesystem` class is used for testing purposes, but could be used to provide
caching in a different way from the way it is implemented in the caching class.
For example, if you need to alter the content of the KB docs before displaying
them. You could save the result some where on disk and load it through the
`Filesystem` provider.

```php
require(__dir__ . '/vendor/autoload.php');

use \Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;

$provider = new Filesystem(__dir__ . '/kbCache/');
```

### Web
The `Web` class is used to load data from the Knowledge Base REST API. It
requires credentials to authenticate to the REST API.

```php
require(__dir__ . '/vendor/autoload.php');

use \Edu\Iu\Uits\KnowledgeBase\Provider\Web\Web;

$provider = new Web('https://rest.kb.iu.edu', 'username', 'password');
```

### Instantiating the KB class
```php
require(__dir__ . '/vendor/autoload.php');

use \Edu\Iu\Uits\KnowledgeBase\KnowledgeBase;
use \Edu\Iu\Uits\KnowledgeBase\Provider\Web\Web;

$provider = new Web('https://rest.kb.iu.edu', 'username', 'password');

$kb = new KnowledgeBase($provider);
```

### Caching
In previous versions caching was built into the main class, but the resulting
implementation was quite messy. It also forced users to use a cache even if they
did not want to. Caching is now provided by a separate intermediate provider.

The cache class requires a provider, a cache object, and a TTL. The default time
for the TTL is 3600 seconds.

Also note that the Caching provider will also cache search results. It will
always refresh the search result cache after the TTL though as there is no way
to check if the search results have changed.

```php
require(__dir__ . '/vendor/autoload.php');

use \Doctrine\Common\Cache\ApcuCache;
use \Edu\Iu\Uits\KnowledgeBase\KnowledgeBase;
use \Edu\Iu\Uits\KnowledgeBase\Provider\{
    Caching\Caching,
    Web\Web,
};

$kb_provider = new Web('https://rest.kb.iu.edu', 'username', 'password');
$cache = new ApucCache();
$provider = new Caching($kb_provider, $cache);

$kb = new KnowledgeBase($provider);
```

### Fetching a document
```php
$doc = $kb->getDocument('rest');
echo $doc->getContent();
```

### Searching the KB
```php
$search = $kb->getSearch('outlook');
foreach ($search->getResults() as $result) {
    echo "[{$result->getDocid()}] {$result->getTitle()}" . PHP_EOL;
}
```

## Contributing
Contributions are welcome in the form of a github pull request. Note, for
consistency sake, please run `composer check` and `composer run-tests` on any code
you wish to contribute to this project and fix and resolve any issues found.
