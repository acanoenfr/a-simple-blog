<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 24/08/2018
 * Time: 12:13
 */

namespace App\Database\Entity;


class Entity
{
    public function __get($key)
    {
        $method = "get" . ucfirst($key);
        $this->key = $this->$method();
        return $this->key;
    }
}
