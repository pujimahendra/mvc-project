<?php 

class App {
    // properti untuk menentukan defaul controller, method, dan parameter defaultnya
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct()
        {
            $url = $this->parseURL();
            // var_dump($url);
            if( !empty($url) && file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);   
            }
            
            require_once '../app/controllers/'. $this->controller .'.php';
            // echo 'oke <br>';
            $this->controller = new $this->controller;

            // method
            if( isset($url[1])){
                if( method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
            // param
            if( !empty($url)){
                $this->params = array_values($url);
            }
// echo $this->controller;
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

    public function parseURL(){
        // mengecek apabila ada get url
        if(isset($_GET['url'])){
                // menghilangkan '/' pada akhir url, bila ada
                $url = rtrim($_GET['url'],'/');
                // membersihkan dari url aneh aneh
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // menjadikan url sebuah array dengan '/' sebagai batasnya
                $url = explode('/', $url);
                return $url;
            }
    }
}