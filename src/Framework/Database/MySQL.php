<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 21/08/2018
 * Time: 08:11
 */

namespace App\Database;


class MySQL extends Database
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * MySQL constructor.
     */
    public function __construct()
    {
        try {
            $this->db = new \PDO($_ENV["database"]["dsn"], $_ENV["database"]["user"], $_ENV["database"]["pass"]);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
            $this->db->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
        } catch (\PDOException $e) {
            if ($_ENV["debug"]) {
                die ($e->getMessage());
            } else {
                die ('Une erreur est survenue, contactez un administrateur.');
            }
        }
    }

    /**
     * @param string $sth
     * @param array $attr
     * @param bool $one
     * @param bool $class_name
     * @return array|bool|mixed
     */
    public function query(string $sth, array $attr = [], $one = true, $class_name = null)
    {
        $req = $this->db->prepare($sth);
        $res = $req->execute($attr);
        if (strpos($sth, "INSERT") === 0 || strpos($sth, "UPDATE") === 0 || strpos($sth, "DELETE") === 0) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(\PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            return $req->fetch();
        } else {
            return $req->fetchAll();
        }
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
