<?php

namespace Core\Service\Caching;

use Nette\Caching\Cache;
use Nette\Caching\Storages\FileStorage;

class CachingService
{

    private Cache $cache;

    public function __construct()
    {
        $storage = new FileStorage(ROOT_PATH . setting("caching.path"));
        $this->cache = new Cache($storage);
    }

    /**
     * @throws \Throwable
     */
    public function get(string $key): mixed
    {
        return $this->cache->load($key);
    }

    public function remove(string $key): void
    {
        $this->cache->remove($key);
    }

    public function clean(): void
    {
        $this->cache->clean([Cache::ALL => true]);
    }

    public function save(string $key, mixed $data, array $dependencies = []): void
    {
        $this->cache->save($key, $data, $dependencies);
    }

}