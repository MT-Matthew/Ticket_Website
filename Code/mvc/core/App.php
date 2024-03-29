<?php

class App
{
    public $controller = "home";
    public $action = "show";
    public $param;

    function __construct()
    {
        $arr = $_GET;
        $arr = $this->Urlprocess();
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/" . $this->controller . ".php";

        //xử lý action xem funtion nào được gọi trong các controller
        $this->controller = new $this->controller;
        if (isset($arr[1])) {   //kiểm tra xem có tồn tại function trong controller không
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // xử lý param
        $this->param = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->param);
    }

    function Urlprocess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
