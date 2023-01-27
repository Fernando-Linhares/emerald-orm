<?php

namespace Emerald\Orm\Databases;

use Emerald\Orm\Contracts\{IKitSQL,IQueryString};

class MysqlKit implements IKitSQL
{
    public function getQueryString(): IQueryString
    {
        return new MysqlQueryString;
    }
}