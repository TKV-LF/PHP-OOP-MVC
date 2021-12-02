<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;

/** 
 * @Author: ThuyNT 
 * @Date: 2021-10-24 20:30:27 
 * @package  app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'ThuyNT'
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact()
    {
        return 'Handling submitted data';
    }
}