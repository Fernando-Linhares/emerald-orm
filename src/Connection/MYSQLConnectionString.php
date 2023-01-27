<?php

namespace Emerald\Orm\Connection;

use Emerald\Orm\Contracts\IConnectionString;
use Emerald\Orm\Structure\VarEnv;

class MYSQLConnectionString implements IConnectionString
{
    public static string $database;
    public static string $host;
    public static string $user;
    public static string $password;
    public static string $connection;

    public function toArray(): array
    {
        self::$host = VarEnv::get('HOST');
        self::$database = VarEnv::get('DATABASE');
        self::$user = VarEnv::get('USER');
        self::$password = VarEnv::get('PASSWORD');

        return [
            self::$host,
            self::$user,
            self::$password,
            self::$database,
        ];
    }
}