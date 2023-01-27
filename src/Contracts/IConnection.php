<?php

namespace Emerald\Orm\Contracts;

interface IConnection
{
    /**
     * @return void
     */
    public function open(): void;

    /**
     * @return void
     */
    public function close(): void;

    /**
     * @return mixed
     */
    public function get();
}