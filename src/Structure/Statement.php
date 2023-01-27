<?php

namespace Emerald\Orm\Structure;

use Emerald\Orm\Contracts\IKitSQL;

class Statement
{
   public function __construct(
        public $result,
        public IKitSQL $kit,
        public int $timestamp,
    ){}
}