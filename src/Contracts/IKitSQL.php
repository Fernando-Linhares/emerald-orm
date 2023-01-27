<?php

namespace Emerald\Orm\Contracts;

interface IKitSQL
{
    public function getQueryString(): IQueryString;
}