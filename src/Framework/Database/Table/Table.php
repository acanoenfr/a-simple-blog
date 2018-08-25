<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 24/08/2018
 * Time: 12:16
 */

namespace App\Database\Table;


use App\Database\MySQL;

class Table
{
    /**
     * @var MySQL
     */
    protected $db;

    /**
     * @var string
     */
    protected $table;

    /**
     * Table constructor.
     * @param MySQL $db
     */
    public function __construct(MySQL $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode("\\", get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace("Table", "", $class_name)) . "s";
        }
    }

    /**
     * @return array|bool|mixed
     */
    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

    /**
     * @param $id
     * @return array|bool|mixed
     */
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @param $id
     * @param $fields
     * @return array|bool|mixed
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attr = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attr[] = $v;
        }
        $attr[] = $id;
        $sql_part = implode($sql_parts, ", ");
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attr, true);
    }

    /**
     * @param $id
     * @return array|bool|mixed
     */
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @param $fields
     * @return array|bool|mixed
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attr = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attr[] = $v;
        }
        $sql_part = implode($sql_parts, ", ");
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attr, true);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
     * @param string $sth
     * @param array $attr
     * @param bool $one
     * @return array|bool|mixed
     */
    public function query(string $sth, array $attr = [], bool $one = false)
    {
        return $this->db->query($sth, $attr, $one, str_replace("Table", "Entity", get_class($this)));
    }
}
