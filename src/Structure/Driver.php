<?php

namespace Emerald\Orm\Structure;

use Emerald\Orm\Contracts\IConnectionString;
use Emerald\Orm\Databases\{ PostgresKit, MysqlKit };
use Emerald\Orm\Exceptions\ConnectionErrorException;

class Driver
{
    public static function mysql(IConnectionString $connectionString)
    {
        $data =  $connectionString->toArray();

        $charset = self::getCharsetByConfig();

        $connection =  mysqli_connect(...$data);

        mysqli_set_charset($connection, $charset);

        if(mysqli_errno($connection))
            throw new ConnectionErrorException(mysqli_connect_error());

        return new Statement($connection, new MysqlKit, strtotime(date('Y-m-d H:m:s')));
    }

    public static function pgsql(IConnectionString $connectionString)
    {
        $charset = self::getCharsetByConfig();

        $data =  $connectionString->toArray();

        $connFormatString = '';
        $connFormatString .= "host={$data[0]} ";
        $connFormatString .= "port={$data[1]} ";
        $connFormatString .= "dbname={$data[2]} ";
        $connFormatString .= "user={$data[3]} ";
        $connFormatString .= "password={$data[4]} ";
        $connFormatString .= "options='--client_encoding={$charset}' ";

        $connection =  pg_connect($connFormatString);

        return new Statement($connection, new PostgresKit, strtotime(date('Y-m-d H:m:s')));
    }

    public static function getCharsetByConfig()
    {
        $config = require_once '../config.php';

        return match($config::CHARSET){
            CHARSET::UTF8 => 'UTF8',
            CHARSET::ISO_8859_1 => 'ISO88591',
            CHARSET::NATS_SEFI => 'NATSSEFI',
            CHARSET::ISO_5427 => 'ISO5427',
            CHARSET::ISO_2022_KR => 'ISO2022KR'
        };
    }
}