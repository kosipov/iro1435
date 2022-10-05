<?php

namespace Kosipov\Iro1435\Routing;

use Kosipov\Iro1435\Request;

class Router
{
    const SUPPORTED_HTTP_METHODS = [
        'GET',
        'POST'
    ];
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    function __call(string $name, array $args)
    {
        list($route, $method) = $args;

        if (!in_array(strtoupper($name), self::SUPPORTED_HTTP_METHODS)) {
            $this->invalidMethodHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->phpSelf);
        $method = $methodDictionary[$formatedRoute];

        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }

    //$router->post('/users', fn () => (new UserController())->getUsers());
    private function invalidMethodHandler()
    {
        header("405 Method Not Allowed");
    }

    private function formatRoute($route)
    {
        $result = rtrim($route, '/');

        if ($result === '') {
            return '/';
        }

        return $result;
    }

    private function defaultRequestHandler()
    {
        header("404 Not Found");
    }

    function __destruct() {
        $this->resolve();
    }
}