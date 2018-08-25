<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 20/08/2018
 * Time: 22:01
 */

/**
 * Name of your application
 * eg. A word can describe your app
 */
$_ENV["name"] = "Blog";

/**
 * Environment where is your app
 * Available parameters: local, test, production
 */
$_ENV["env"] = "local";

/**
 * Debug mode on your app
 * eg. Show MySQL errors or create logs in a file
 */
$_ENV["debug"] = true;

/**
 * Base of the URL
 * Must contains http:// or https:// and the domain name
 */
$_ENV["base_url"] = "http://localhost";

/**
 * Layout for the web page
 */
$_ENV["templates"] = "default";

/**
 * Directories
 * Templates, Public files
 */
$_ENV["dirs"] = [
    "templates" => "templates/",
    "public" => "web/"
];

/**
 * Connection to your database
 * Change the DSN, username and password
 */
$_ENV["database"] = [
    "dsn" => "mysql:host=localhost;dbname=blog;",
    "user" => "admin",
    "pass" => "Me2seinS5962"
];

$_ENV["root"] = dirname($_SERVER["DOCUMENT_ROOT"]);
