<?php

namespace app\core;

/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-23 21:39:11 
 * @package namespace app\core
 */

class Request
{
    
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            # code...
            return $path;
        }
        $path = substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}