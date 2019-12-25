<?php


namespace App\services;


class Request
{
    private $requestUrl;
    private $requestData;
    private $controller;
    private $action;
    private $sessionId;

    public function __construct()
    {
        $this->requestUrl = $_SERVER['REQUEST_URI'];
        $this->requestData = [
            'getData' => $_GET,
            'postData' => $_POST,
            'jsonPostData' => json_decode(file_get_contents("php://input"), true),
        ];
        $this->parseRequest();
        $this->sessionId = session_id();
    }

    private function parseRequest() {
        $uriArray =  explode('/', $this->requestUrl);
        $this->controller = $uriArray[1];
        $this->action = empty($uriArray[2]) ? '' : ($uriArray[2]);
    }

    public function getGetParams(): array
    {
        if(empty($this->requestData['getData'])) {
            return array();
        }
        return $this->requestData['getData'];
    }

    public function getPostData() {
        if(empty($this->requestData['postData'])) {
            return array();
        }
        return $this->requestData['postData'];
    }

    public function getJsonPostData() {
        if(empty($this->requestData['jsonPostData'])) {
            return array();
        }
        return $this->requestData['jsonPostData'];
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getSessionId()
    {
        return $this->sessionId;
    }

}