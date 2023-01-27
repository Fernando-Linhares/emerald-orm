<?php

namespace Emerald\Orm\Databases;

use Emerald\Orm\Contracts\IQueryString;

class MysqlQueryString implements IQueryString
{
    private string $content = '';

    public function select(array $columns=[])
    {
        $this->content .= 'SELECT ';

        if(empty($columns)){

            $this->content .=  '* ';
            
            return $this;
        }

        $this->content .=  '';
            
        return $this;
    }

    public function selectDistinct(array $columns=[])
    {
        $this->content .= 'SELECT DISTINCT ';

        if(empty($columns)){

            $this->content .=  '* ';
            
            return $this;
        }

        $this->content .=  '';
            
        return $this;
    }

    public function selectCount()
    {
        $this->content .= 'SELECT COUNT(*) ';

        $this->content;
    }

    public function from(string $table)
    {
        $this->content .= 'FROM '. $table.' ';

        return $this;
    }

    public function innerJoin(
        string $table,
        string $table_reference,
        string $operator,
        string $origin_reference
    ){
        $this->content .= 'INNER JOIN '.$table.' ';
        $this->content .= 'ON '.$table_reference.' ';
        $this->content .= $operator.' ';
        $this->content .= $origin_reference.' ';

        return $this;
    }

    public function leftJoin(
        string $table,
        string $table_reference,
        string $operator,
        string $origin_reference
    ){
        $this->content .= 'LEFT JOIN '.$table.' ';
        $this->content .= 'ON '.$table_reference.' ';
        $this->content .= $operator.' ';
        $this->content .= $origin_reference.' ';

        return $this;
    }

    public function rightJoin(
        string $table,
        string $table_reference,
        string $operator,
        string $origin_reference
    ){
        $this->content .= 'RIGHT JOIN '.$table.' ';
        $this->content .= 'ON '.$table_reference.' ';
        $this->content .= $operator.' ';
        $this->content .= $origin_reference.' ';

        return $this;
    }

    public function where(
        string $table_reference,
        string $operator,
        string $origin_reference
    )
    {
        $this->content .= 'WHERE '.$table_reference.' ';
        $this->content .= $operator.' ';
        $this->content .= $origin_reference.' ';

        return $this;
    }

    public function orderBy($column)
    {
        $this->content .= 'ORDER BY '.$column.' ';

        return $this;
    }

    public function between(...$values)
    {
        $this->content .= 'BETWEEN ';

        for($i = 0; $i < count($values); $i++){
            if($i == (count($values) - 1)){
                $this->content .= $values[$i] . ' ';
                continue;
            }

            $this->content .= $values[$i] . 'AND ';
        }

        return $this;
    }

    public function desc()
    {
        $this->content .= 'DESC ';

        return $this;
    }

    public function whereNull(string $column)
    {
        $this->content .= 'WHERE ' . $column . 'IS NULL ';

        return $this;
    }

    public function whereNotNull(string $column)
    {
        $this->content .= 'WHERE ' . $column . 'IS NOT NULL ';

        return $this;
    }

    public function asc()
    {
        $this->content .= 'ASC ';

        return $this;
    }

    public function limit(string|int $number)
    {
        $this->content .= 'LIMIT '.$number.' ';

        return $this;
    }

    public function offset($number)
    {
        $this->content .= 'OFFSET '.$number.' ';

        return $this;
    }

    public function groupBy($column)
    {
        $this->content .=  'GROUP BY '.$column.' ';

        return $this;
    }

    public function update($table)
    {
        $this->content .=  'UPDATE '.$table.' ';

        return $this;
    }

    public function set(array $values)
    {
       foreach($values as $key => $value){
            $this->content = $key .' = '.$value.' ';
       }

       return $this;
    }

    public function union()
    {
        $this->content .= 'UNION ';

        return $this;
    }

    public function unionAll()
    {
        $this->content .= 'UNION ALL ';

        return $this;
    }

    public function having($reference, $operator, $value)
    {
        $this->content .= 'HAVING '.$reference.' '.$operator.' '.$value;

        return $this;   
    }

    public function exists($subquery)
    {
        $this->content .= 'WHERE EXISTS ('. $subquery(new self) .') ';

        return $this;
    }

    public function __toString()
    {
        return rtrim($this->content);
    }
}