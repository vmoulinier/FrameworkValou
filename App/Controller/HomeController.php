<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $to = [
            [
                'Email' => "vmoulinier33@gmail.com",
                'Name' => "Valentin"
            ]
        ];
        $subject = 'Sujet test';
        $htmlPart = '<h3>Dear passenger 1, welcome to <a href=\'https://www.mailjet.com/\'>Mailjet</a>!</h3><br />May the delivery force be with you!';
        //$this->services->sendMail($to, $subject, $htmlPart);
        //$this->services->getDoctrine();
        //$test = new Test();
        //$test->setNom('test');
        //$this->services->getDoctrine()->persist($test);
        //$this->services->getDoctrine()->flush();


        $this->template = 'default';
        $this->render('home/index');
    }
}

