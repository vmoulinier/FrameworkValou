<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $str = 'Hello World';

        $this->template = 'default';
        $this->title = 'Page d\'accueil';
        $this->render('home/index', compact('str'));
    }
}
