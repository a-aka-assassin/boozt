<?php
class App
{
    //default rerouting to index in controller
    protected $controller = "home";
    protected $method = "index";

    public function __construct()
    {

        require_once '../app/controllers/home.php';
        $this->controller = new $this->controller;
        if (method_exists($this->controller, 'index')) {
            call_user_func(array('Home', 'index'));
        }
    }
}
