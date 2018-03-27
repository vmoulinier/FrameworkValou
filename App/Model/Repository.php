<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 13/03/2017
 * Time: 18:00
 */

namespace App\Model;


use Core\Controller\DoctrineORM;

class Repository extends DoctrineORM
{
    public function hydrate($strobject, array $data) {
        $strobject =  '\App\Entity\\'.ucfirst($strobject);
        if(class_exists($strobject)){
            $object = new $strobject();
            foreach ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($object, $method)) {
                    $object->$method($value);
                }
            }
            return $object;
        }
        return false;
    }
}