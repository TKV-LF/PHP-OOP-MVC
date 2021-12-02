<?php

namespace app\core;
/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-23 20:56:31 
 * @package namespace app\core
 */

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

    }

    public function run()
    {
        echo $this->router->resolve();

    }


}