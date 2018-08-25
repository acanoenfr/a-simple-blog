<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 21/08/2018
 * Time: 08:05
 */

namespace App;


use App\Database\MySQL;
use App\Router\Router;

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * @var App
     */
    private static $_instance;

    /**
     * @var MySQL
     */
    private $db_instance;

    /**
     * @var Router
     */
    private $router;

    /**
     * @return App
     */
    public static function initialize()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * App constructor.
     */
    public function __construct()
    {
        session_start();
        $this->router = new Router();
    }

    public function run()
    {
        foreach ($_ENV["routes"] as $route) {
            $this->router->addRoute($route[0], $route[1], $route[2]);
        }
        $this->router->handle();
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Database\\Table\\' . ucfirst($name) . "Table";
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if (is_null($this->db_instance)) {
            $this->db_instance = new MySQL();
        }
        return $this->db_instance;
    }
}
