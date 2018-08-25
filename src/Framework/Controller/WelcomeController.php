<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 22/08/2018
 * Time: 10:59
 */

namespace App\Controller;


class WelcomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $title = "Home" . $this->title;
        $this->render("welcome.home", compact('title'));
    }
}
