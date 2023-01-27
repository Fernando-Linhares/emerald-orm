<?php

namespace Emerald\Orm\Contracts;

interface IConnectionString
{
    /**
     * @return array
     */
    public function toArray(): array;
}