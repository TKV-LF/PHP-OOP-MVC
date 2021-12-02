<?php

namespace app\core;

/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-23 21:39:11 
 * @package namespace app\core
 */

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            # code...
            $this->response->setStatus(404);
            return $this->renderView("_404");
        }
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
        
    }

    
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            # code...
            // cai tham chieu kieu
            // $$key = name tuc la se co mot bien se co mot bien $name bang cai value ton tai
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}