<?php

namespace Emerald\Orm\Databases;

use Emerald\Orm\Contracts\{ IQueryString, IKitSQL };

class PostgresKit implements IKitSQL
{
    public function getQueryString(): IQueryString
    {
        return new MysqlQueryString;
    }
}