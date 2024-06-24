<?php

class Router
{
    private MessageController $mc;

    public function __construct() {
        $this->mc = new MessageController();
    }

    public function handleRequest(array $get) {
        if(isset($get['route']) && $get['route'] === "home") {
            $this->mc->home();
        } if(isset($get['route']) && $get['route'] === "postMessage") {
            $this->mc->addMessage();
        } else if(!isset($get['route'])) {
            $this->mc->home();
        } 
    }
}