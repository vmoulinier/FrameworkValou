<?php

namespace App\Services;

use Core\Services\Services;
use Mailjet\Client;
use Mailjet\Resources;

class MailjetService extends Services
{

    protected $mailjet;

    public function __construct()
    {
        parent::__construct();
        $this->mailjet = new Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE, true,['version' => 'v3.1']);
    }

    public function sendMail(string $to, string $subject, string $htmlPart): void
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
}
