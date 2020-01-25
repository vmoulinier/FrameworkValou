<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 09/03/2017
 * Time: 23:53
 */

namespace App\Controller;


use App\Entity\Translations;
use App\Model\SPDO;
use App\Model\UserRepository;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        //if is not logged admin, then acces denied
        if(!$this->twig->loggedAdmin()){
            $this->denied();
        }
    }

    public function index()
    {
        $this->template = 'default';
        $this->render('admin/index');
    }

    public function translations()
    {
        if(!empty($_POST)) {
            if(isset($_POST['id'])) {
                $repo = $this->services->getRepository('translations');
                $repo->updateTranslation($_POST);
            }
            if(isset($_POST['search'])) {
                $translation = $_POST['search'];
                $translation = $this->services->getDoctrine()->getRepository('App\Entity\Translations')->findOneBy(['nom' => $translation]);
                if($translation) {
                    echo '<td id="nom'.$translation->getId().'">';
                    echo $translation->getNom();
                    echo '</td>';
                    echo '<td id="fr'.$translation->getId().'">';
                    echo $translation->getFr();
                    echo '</td>';
                    echo '<td id="en'.$translation->getId().'">';
                    echo $translation->getEn();
                    echo '</td>';
                    echo '<td>';
                    echo '<i class="fas fa-search mr-4 pointer" data-toggle="modal" data-target="#translateModal" id="translationId" data-id="'.$translation->getId().'"></i>';
                    echo '<i class="fas fa-trash red pointer"></i>';
                    echo '</td>';
                }
                die;
            }

        }
        $this->template = 'default';
        $this->render('admin/translations');
    }
}