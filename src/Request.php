<?php

namespace App;

class Request
{

    private array $params = [];

    public function __construct()
    {
        $this->params['REQUEST'] = $_REQUEST;
    }

    public function getParam(string $key)
    {

        return $this->params['REQUEST'][$key]
            ? htmlspecialchars($this->params['REQUEST'][$key])
            : null;
    }
}