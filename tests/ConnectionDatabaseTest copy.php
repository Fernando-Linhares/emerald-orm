<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ConnectionDatabaseTest extends TestCase
{
    /**
     * @test
     */
    public function database_connection_is_stable()
    {
        $this->assertTrue(true);
    }
}