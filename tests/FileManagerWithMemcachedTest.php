<?php

namespace rockunit;

use League\Flysystem\Adapter\Local;
use rock\file\FileManager;
use League\Flysystem\Cache\Memcached;

/**
 * @group base
 * @group memcached
 */
class FileManagerWithMemcachedTest extends FileManagerTest
{
    protected function setUp()
    {
        if (!class_exists('\Memcached')) {
            $this->markTestSkipped(
                'The \Memcached is not available.'
            );
        }
        $memcached = new \Memcached();
        $memcached->addServer('localhost', 11211);
        $config = [
            'adapter' => new Local(ROCKUNIT_RUNTIME . '/filesystem'),
            'cache' => new Memcached($memcached)
        ];
        $this->fileManager = new FileManager($config);
        $this->fileManager->deleteAll();
    }
}
 