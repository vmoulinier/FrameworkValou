<?php

namespace App\Services;

use Core\Config\BaseServices;
use Core\Services\Services;

class AdminService extends BaseServices
{

    /**
     * AdminService constructor.
     */
    public function __construct(Services $services)
    {
        parent::__construct($services);
    }

    public function test()
    {

    }
}