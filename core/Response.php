<?php
namespace app\core;
/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-24 20:00:55 
 * @package app\core  
 */

 class Response
 {
     public function setStatus(int $code)
     {
        http_response_code($code);
     }
 }