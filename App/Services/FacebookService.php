<?php

namespace App\Services;

use Core\Services\Services;

class FacebookService extends Service
{

    private $fb;

    private $helper;

    private $mj;

    /**
     * FacebookService constructor.
     */
    public function __construct(Services $services)
    {
        parent::__construct($services);
        $this->fb = new \Facebook\Facebook([
            'app_id' => FACEBOOK_APIKEY,
            'app_secret' => FACEBOOK_API_SECRET,
            'default_graph_version' => 'v2.10',
            //'default_access_token' => '{access-token}', // optional
        ]);
        $this->helper = $this->fb->getRedirectLoginHelper();
        $this->mj = $this->services->getService('mailjet');
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

    public function loginfb(string $email, string $facebookId): bool
    {
        $user = $this->getRepository('user')->findOneBy(['email' =>$email, 'facebook_id' => $facebookId]);
        if($user) {
            if($user->getType() === 'ROLE_ADMIN'){
                $this->saveSessionAdmin($user->getId(), $user->getType());
                return true;
            }
            $this->saveSession($user->getId());
            return true;
        }
        return false;
    }

    private function saveSession(int $id): void
    {
        $_SESSION['user_id'] = $id;
    }

    private function saveSessionAdmin(int $id, string $role): void
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_role_admin'] = $role;
    }

    public function getUrlLoginFacebook($scope): string
    {
        return $this->helper->getLoginUrl(PATH .'/loginfb/', $scope);
    }

}
