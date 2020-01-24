<?php


namespace Core;

use Mailjet\Client;

class Config
{
    protected $mailjet;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->mailjet = new Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE, true,['version' => 'v3.1']);
    }
}