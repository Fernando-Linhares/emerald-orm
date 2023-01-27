<?php

namespace Emerald\Orm\Connection;

use Emerald\Orm\Contracts\IConnection;
use Emerald\Orm\Structure\VarEnv;
use Emerald\Orm\Structure\Driver;

class ConnectionDatabase implements IConnection
{
    private static $instance;

    /**
     * @return void
     */
    public function open(): void
    {
        $connection = VarEnv::get('CONNECTION');

        if(empty(self::$instance))
            self::$instance = match($connection)
            {
                "mysql" => Driver::mysql(new MYSQLConnectionString),
                "pgsql" => Driver::pgsql(new PGSQLConnectionString),
            };
    }

    /**
     * @return void
     */
    public function close(): void
    {
        mysqli_close(self::$instance);
    }

    public function get()
    {
        if(empty(self::$instance))
            $this->open();

        return self::$instance;
    }
}