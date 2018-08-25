<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 24/08/2018
 * Time: 12:08
 */

namespace App\Database\Builder;



class Query
{
    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        $query = new QueryBuilder();
        return call_user_func_array([$query, $method], $arguments);
    }
}
