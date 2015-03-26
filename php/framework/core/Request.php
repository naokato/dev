<?php

class Request
{
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }
    
    public function getGet($name, $default = null)
    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $default;
    }
    
    public function getPost($name, $default = null)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
        return $default;
    }
    
    public function getHost()
    {
        if ( ! empty($_SERVER['HTTP_HOST'])) {
            return $_SERVER['HTTP_HOST'];
        }
        return $_SERVER['SERVER_NAME'];
    }
    
    public function isSsl()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            return true;
        }
        return false;
    }
    
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getBaseUrl()
    {
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $requestUri = $this->getUri();
        
        if (strpos($requestUri, $scriptName) === 0) {
            return $scriptName;
        }

        if (strpos($requestUri, dirname($scriptName)) === 0) {
            return dirname($scriptName);
        }
        return '';
    }
    
    public function getPathInfo()
    {
        $baseUrl = $this->getBaseUrl();
        $requestUri = $this->getUri();

        $pos = strpos($requestUri, '?');
        if ($pos !== false) {
            $requestUri = substr($requestUri, 0, $pos);
        }

        $pathInfo = substr($requestUri, strlen($baseUrl));
        return $pathInfo;
    }
}
