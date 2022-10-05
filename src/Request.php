<?php

namespace Kosipov\Iro1435;

use Exception;

class Request
{
    public function __construct()
    {
        $this->bootstrapSelf();
    }

    /**
     * @throws Exception
     */
    public function getBody()
    {
        if ($this->requestMethod === 'GET') {
            return;
        }

        if ($this->requestMethod === 'POST') {
            $body = [];

            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }

        throw new Exception();
    }

    public function getQuery()
    {
        if ($this->requestMethod !== 'GET') {
            return;
        }

        $query = [];
        foreach ($_GET as $key => $value) {
            $query[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $query;
    }

    private function bootstrapSelf()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($key)
    {
        $result = strtolower($key);
        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }
}