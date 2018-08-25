<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 22/08/2018
 * Time: 10:59
 */

namespace App\Controller;


use App\App;

class Controller
{
    /**
     * @var string
     */
    protected $title;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->title = " | Blog";
    }

    public function loadModel($name)
    {
        $this->$name = App::initialize()->getTable($name);
    }

    public function render(string $view, array $vars = [])
    {
        ob_start();
        extract($vars);
        require("{$_ENV["root"]}/" . $_ENV["dirs"]["templates"] . str_replace(".", "/", $view) . ".php");
        $content_for_layout = ob_get_clean();
        require("{$_ENV["root"]}/" . $_ENV["dirs"]["templates"] . 'layouts/' . $_ENV["templates"] . ".php");
    }

    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die ("Accès interdit");
    }

    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die ("Page introuvable");
    }
}
