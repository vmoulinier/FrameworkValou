<?php

namespace Core\Services;

use App\Model\Repository;
use Core\Config\Config;
use Doctrine\ORM\EntityManager;
use Mailjet\Resources;

require_once 'Core/Config/Config.php';

class Services extends Config
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
        $this->mailjet->post(Resources::$Email, ['body' => $body]);
    }

    public function getRepository($entity): Repository
    {
        if(class_exists('\App\Model\\' . ucfirst($entity) . 'Repository')) {
            $repository = '\App\Model\\' . ucfirst($entity) . 'Repository';
            return new $repository();
        }

        throw new \Error('repository not found');
    }

    public function getDoctrine(): EntityManager
    {
        return $this->entityManager;
    }

    public function getUrlLoginFacebook($scope): string
    {
        return $this->helper->getLoginUrl(PATH .'/loginfb/', $scope);
    }

    public function getProfilFacebook()
    {
        try {
            $accessToken = $this->helper->getAccessToken();
            $response = $this->fb->get('/me?fields=email,first_name,last_name,gender', $accessToken->getValue());
            return $response->getGraphUser();
        } catch (FacebookResponseException  $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

}
