<?php
namespace app\core;
use app\core\Application;


/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-24 21:00:16 
 * @package app\core 
 */

class Controller 
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}