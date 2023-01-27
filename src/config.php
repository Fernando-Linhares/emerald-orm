<?php

namespace Emerald\Orm;

use Emerald\Orm\Structure\CHARSET;
use Emerald\Orm\Structure\Configuration;

return new class extends Configuration
{
    public const DOTENV = '';

    public const CHARSET = CHARSET::UTF8;

};