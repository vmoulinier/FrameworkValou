<?php

namespace App\Model;

class AdminRepository extends Repository
{
    public function login(int $id): void
    {
        $_SESSION['edit_admin_id'] = $_SESSION['user_id'];

        $userRepo =  $this->entityManager->getRepository('user');
        $user = $userRepo->find($id);

        if($user->getType() === 'ROLE_ADMIN'){
            $userRepo->saveSessionAdmin($user->getId(), $user->getType());
            return;
        }

        $userRepo->saveSession($user->getId());
    }
}
