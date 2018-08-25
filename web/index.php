<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 20/08/2018
 * Time: 22:00
 */

require "../vendor/autoload.php";
require_once "../config/variables.php";
require_once "../config/routes.php";

$app = \App\App::initialize();

$app->run();
