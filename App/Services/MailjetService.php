<?php

namespace App\Services;

use Core\Config\BaseServices;
use Mailjet\Client;
use Mailjet\Resources;

class MailjetService extends BaseServices
{
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
        $this->getMalilJet()->post(Resources::$Email, ['body' => $body]);
    }

    public function getMalilJet(): Client
    {
        return new Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE, true,['version' => 'v3.1']);
    }
}
