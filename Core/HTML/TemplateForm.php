<?php
namespace Core\HTML;

class TemplateForm extends Form{
    
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }
    
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $required = isset($options['required']) == 'false' ? ' ' : 'required';
        if($type === 'textarea'){
            $input = '<textarea name="' . $name . '" class="form-control" '. $required .'>' . $name . '</textarea>';
        } elseif ($type === 'hidden') {
            return '<input type="' . $type . '" name="' . $name . '" value="' . $label . '">';
        } else{
            $input = '<input type="' . $type . '" name="' . $name . '" class="form-control"  '. $required .'>';
        }
        $label = '<label>' . $label . '</label>';
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }
    
    public function submit($value, $name = false){
        if($name) {
            return $this->surround('<button type="submit" name="'.$name.'" class="btn btn-primary" style="white-space: normal;">'.$value.'</button>');
        } else {
            return $this->surround('<button type="submit" class="btn btn-primary">'.$value.'</button>');
        }
    }
}