<?php

namespace Emerald\Orm\Structure;

use Emerald\Orm\Exceptions\NotFoundEnvVarsException;

class VarEnv
{
    public static function get($var): string
    {
        if(array_key_exists($var, $_ENV))
            return $_ENV[$var];

        $configuration = require_once  '../config.php';

        if($configuration::hasDotenv())
        {
            return $configuration::DOTENV;
        }

        throw new NotFoundEnvVarsException([$key]);
    }
}