<?php

namespace App\Model;

class Repository
{
    public function hydrate($strobject, array $data)
    {
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