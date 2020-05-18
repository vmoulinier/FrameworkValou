<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $str = 'Hello World';

        $this->template = 'default';
        $this->render('home/index', compact('str'));
    }
}
