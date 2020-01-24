<?php

namespace Core\Services;

use Core\Config;
use Mailjet\Resources;

require_once 'Core/Config.php';

class Services extends Config
{
    public function sendMail($to, $subject, $htmlPart) {
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

    public function getDoctrine() {
        $entityPath = array("App/Entity");
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, true);
        $databaseParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'test',
        );
        return \Doctrine\ORM\EntityManager::create($databaseParams, $config);
    }
}