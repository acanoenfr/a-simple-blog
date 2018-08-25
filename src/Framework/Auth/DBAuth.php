<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 24/08/2018
 * Time: 13:11
 */

namespace App\Auth;


use App\Database\MySQL;

class DBAuth
{
    /**
     * @var MySQL
     */
    private $db;

    /**
     * DBAuth constructor.
     * @param MySQL $db
     */
    public function __construct(MySQL $db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        if ($this->isLogged()) {
            return $_SESSION["auth"];
        }
        return null;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function signIn($username, $password)
    {
        $user = $this->db->query("SELECT * FROM users WHERE username = ?", [$username], true, null);
        if ($user) {
            if (password_verify($password, $user->password)) {
                $_SESSION["auth"] = $user->id;
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isLogged()
    {
        return isset($_SESSION["auth"]);
    }
}
