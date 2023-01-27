<?php

namespace Emerald\Orm\Exceptions;

class ConnectionErrorException extends \Exception
{
    public function __construct($error)
    {
        parent::__construct("[Connection Error] $error");
    }
}