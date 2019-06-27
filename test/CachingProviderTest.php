<?php
declare(strict_types=1);
/**
 * This file contains the tests for the Caching Provider
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Test;

use Doctrine\Common\Cache\ArrayCache;
use Edu\Iu\Uits\KnowledgeBase\DocumentUuid;
use Edu\Iu\Uits\KnowledgeBase\Provider\Caching\Caching;
use Edu\Iu\Uits\KnowledgeBase\Provider\Filesystem\Filesystem;
use PHPUnit\Framework\TestCase;

class CachingProviderTest extends TestCase
{
    public function testGetDocument()
    {
        $actualProvider = new Filesystem(__dir__ . '/data');
        $cache = new ArrayCache();
        $provider = new Caching($actualProvider, $cache, 3600);

        $this->assertInstanceOf(
            '\stdClass',
            $provider->getDocument('rest')
        );

        $this->assertEquals(
            $actualProvider->getDocument('rest'),
            $provider->getDocument('rest')
        );
        $this->assertTrue($cache->contains('rest'));
    }

    public function testRefreshDocumentWhenStale()
    {
        $actualProvider = new Filesystem(__dir__ . '/data');
        $cache = new ArrayCache();
        $provider = new Caching($actualProvider, $cache, 3600);
        $yesterday = new \DateTime('yesterday');
        $badUuid = '00000000-0000-0000-0000-000000000000';

        // Cache test document
        $provider->getDocument('rest');

        // Set it to need refreshed
        $doc = $cache->fetch('rest');
        $doc->setUuid($badUuid);
        $doc->setLastChecked($yesterday);
        $cache->save('rest', $doc);
        unset($doc);

        // Verify it looks right in the cache
        $doc = $cache->fetch('rest');
        $this->assertEquals($badUuid, $doc->getUuid());
        $this->assertEquals($yesterday, $doc->getLastChecked());
        unset($doc);

        // Re-pull the document
        $provider->getDocument('rest');
        $cached = $cache->fetch('rest');

        $this->assertNotEquals($badUuid, $cached->getUuid());
        $this->assertNotEquals($yesterday, $cached->getLastChecked());
    }

    public function testNotRefreshDocumentWhenNotStale()
    {
        $actualProvider = new Filesystem(__dir__ . '/data');
        $cache = new ArrayCache();
        $provider = new Caching($actualProvider, $cache, 3600);
        $badUuid = '00000000-0000-0000-0000-000000000000';

        // Cache test document
        $provider->getDocument('rest');

        // Invalidate Uuid, but leave the date alone
        $doc = $cache->fetch('rest');
        $doc->setUuid($badUuid);
        $cache->save('rest', $doc);
        unset($doc);

        // Verify it looks right in the cache
        $doc = $cache->fetch('rest');
        $this->assertEquals($badUuid, $doc->getUuid());
        unset($doc);

        // Pull the document back out of the cache
        $provider->getDocument('rest');
        $cached = $cache->fetch('rest');

        // And ensure the uuid is still invalid
        $this->assertEquals($badUuid, $cached->getUuid());
    }

    public function testGetSearch()
    {
        $actualProvider = new Filesystem(__dir__ . '/data');
        $cache = new ArrayCache();
        $provider = new Caching($actualProvider, $cache, 3600);

        $this->assertInstanceOf(
            '\stdClass',
            $provider->getSearchResults('json')
        );

        $this->assertEquals(
            $actualProvider->getSearchResults('json'),
            $provider->getSearchResults('json')
        );

        $this->assertTrue($cache->contains('json_0_15'));
    }

    public function testGetDocumentUuid()
    {
        $actualProvider = new Filesystem(__dir__ . '/data');
        $cache = new ArrayCache();
        $provider = new Caching($actualProvider, $cache, 3600);

        $this->assertInstanceOf(
            '\stdClass',
            $provider->getDocumentUuid('rest')
        );

        $this->assertEquals(
            $actualProvider->getDocumentUuid('rest'),
            $provider->getDocumentUuid('rest')
        );
    }
}
