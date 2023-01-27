<?php

namespace Emerald\Orm\Connection;

use Emerald\Orm\Contracts\IConnectionString;
use Emerald\Orm\Structure\VarEnv;

class SQLSRVConnectionString implements IConnectionString
{

    public static string $database;
    public static string $host;
    public static string $user;
    public static string $password;
    public static string $connection;
    public static string $port;

    public function toArray(): array
    {
        self::$host = VarEnv::get('HOST');
        self::$database = VarEnv::get('DATABASE');
        self::$user = VarEnv::get('USER');
        self::$password = VarEnv::get('PASSWORD');
        self::$port = VarEnv::get('PORT');

        return [
            self::$host,
            self::$port,
            self::$database,
            self::$user,
            self::$password,
        ];
    }
}