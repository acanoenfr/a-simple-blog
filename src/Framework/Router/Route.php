<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 22/08/2018
 * Time: 10:18
 */

namespace App\Router;


class Route
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $callable;

    /**
     * Route constructor.
     * @param string $uri
     * @param string $method
     * @param string $callable
     */
    public function __construct(string $uri, string $method, string $callable)
    {
        $this->uri = $uri;
        $this->method = $method;
        $callable = explode("#", $callable);
        $this->callable = $callable;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getCallable(): array
    {
        return $this->callable;
    }
}
