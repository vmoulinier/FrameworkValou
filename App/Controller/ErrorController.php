<?php

namespace App\Controller;

use Core\Controller\Controller;

class ErrorController extends Controller
{
    public function error() {
        $this->template = 'default';
        $this->render('error/404',  compact(''));
    }
}