<?php

use Dibi\Connection;

class BaseModel
{

    /**
     * @throws \Dibi\Exception
     */
    public function __construct()
    {
        return new Connection([
            'driver' => env("DB_DRIVER", setting('db.driver')),
            'database' => env("DB_NAME", setting('db.name')),
            'username' => env("DB_USERNAME", setting('db.username')),
            'password' => env("DB_PASSWORD", setting('db.password')),
            'host' => env("DB_HOST", setting('db.host')),
        ]);
    }

}