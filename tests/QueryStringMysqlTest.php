<?php

namespace Tests;

use Emerald\Orm\Databases\MysqlQueryString;
use PHPUnit\Framework\TestCase;

class QueryStringMysqlTest extends TestCase
{
    /**
     * @test
     */
    public function is_correct_query_string_simple_select()
    {
        $query = new MysqlQueryString;

        $queryString = (string) $query->select()->from('table_example')->where('id', '=', 1);

        $expected = 'SELECT * FROM table_example WHERE id = 1';

        $this->assertEquals($queryString, $expected);
    }


    /**
     * @test
     */
    public function is_correct_query_string_simple_inner_join()
    {
        $query = new MysqlQueryString;

        $queryString = (string) $query->select()
        ->from('table1')
        ->innerJoin('table2', 'table2.id', '=', 'table1.id_table2')
        ->where('id', '=', 1);

        $expected = 'SELECT * FROM table1 INNER JOIN table2 ON table2.id = table1.id_table2 WHERE id = 1';

        $this->assertEquals($queryString, $expected);
    }

    /**
     * @test
     */
    public function is_correct_query_string_simple_subquery()
    {
        $query = new MysqlQueryString;

        $queryString = (string) $query->select()
        ->from('table1')
        ->exists(function ($subquery){
            return $subquery->select()->from('table2');
        });

        $expected = 'SELECT * FROM table1 WHERE EXISTS (SELECT * FROM table2)';

        $this->assertEquals($queryString, $expected);
    }

}