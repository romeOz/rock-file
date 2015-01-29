<?php

namespace rockunit;

/**
 * @group base
 */
class FileManagerWithLocalCacheTest extends FileManagerTest
{
    protected function setUp()
    {
        $this->fileManager = static::getFileManagerWithLocalCache();
        $this->fileManager->deleteAll();
    }
}
 