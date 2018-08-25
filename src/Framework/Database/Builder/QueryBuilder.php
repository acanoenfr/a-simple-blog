<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 24/08/2018
 * Time: 12:01
 */

namespace App\Database\Builder;


class QueryBuilder
{
    /**
     * @var array fields
     */
    private $fields = [];

    /**
     * @var array conditions
     */
    private $conditions = [];

    /**
     * @var array from
     */
    private $from = [];

    /**
     * @return $this
     */
    public function select()
    {
        $this->fields = func_get_args();
        return $this;
    }

    /**
     * @return $this
     */
    public function where()
    {
        foreach (func_get_args() as $arg) {
            $this->conditions[] = $arg;
        }
        return $this;
    }

    /**
     * @param $table
     * @param $alias
     * @return $this
     */
    public function from($table, $alias)
    {
        if (is_null($alias)) {
            $this->from[] = $table;
        } else {
            $this->from[] = "$table as $alias";
        }
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SELECT" . implode(", ", $this->fields)
            . " FROM " . implode(", ", $this->from)
            . " WHERE " . implode(" AND ", $this->conditions);
    }
}
