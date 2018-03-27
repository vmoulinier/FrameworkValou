<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 09/03/2017
 * Time: 23:53
 */

namespace App\Controller;


use App\Model\UserRepository;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $userrepo = new UserRepository();

        //if is not logged admin, then acces denied
        if(!$userrepo->isloggedAdmin()){
            $this->denied();
        }
    }

    public function index() {
        $this->template = 'default';
        $this->render('admin/index');
    }
}