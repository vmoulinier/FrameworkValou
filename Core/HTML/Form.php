<?php

namespace Core\HTML;

class Form{

    private $data;

    public $surround = 'p';

    public function __construct($data = array()){
        $this->data = $data;
    }
    
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }
    
    protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $required = isset($options['required']) ? $options['required'] : 'true';
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" required = "'. $required .'">'
        );
    }
    
    public function submit($value){
        return $this->surround('<button type="submit">'.$value.'</button>');
    }

}