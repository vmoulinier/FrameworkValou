<?php

namespace Core\Services;

use Core\Config;
use Mailjet\Resources;

class Services extends Config
{

    public function sendMail($to, $subject, $htmlPart)
    {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => MJ_FROM_EMAIL,
                        'Name' => MJ_FROM_NAME
                    ],
                    'To' => $to,
                    'Subject' => $subject,
                    'TextPart' => "",
                    'HTMLPart' => $htmlPart,
                    'CustomID' => ""
                ]
            ]
        ];
        $this->mailjet->post(Resources::$Email, ['body' => $body]);
    }

    public function getDoctrine()
    {
        return $this->entityManager;
    }
}