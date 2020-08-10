<?php

namespace Core\HTML;

class TemplateForm extends Form {

    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    protected function surroundCheckbox($html)
    {
        return "<div class=\"form-check\">{$html}</div>";
    }

    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $required = isset($options['required']) == 'false' ? ' ' : 'required';
        if ($type === 'textarea') {
            $txt = isset($_POST[$name]) ? $_POST[$name] : '';
            $input = '<textarea rows=5 name="' . $name . '" class="form-control" '. $required .'>' . $txt . '</textarea>';
        } elseif ($type === 'hidden') {
            return '<input type="' . $type . '" name="' . $name . '" value="' . $label . '">';
        } elseif ($type === 'checkbox') {
            $label = '<label class="form-check-label" for="'.$name.'">' . $label . '</label>';
            $input = '<input type="' . $type . '" name="' . $name . '" class="form-check-input"  '. $required .' id="'.$name.'">';
            return $this->surroundCheckbox($input. $label );
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" class="form-control"  '. $required .'>';
        }
        $label = '<label>' . $label . '</label>';
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k === $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function submit($value, $name = false)
    {
        if($name) {
            return $this->surround('<button type="submit" name="'.$name.'" class="btn primary-btn" style="white-space: normal;">'.$value.'</button>');
        } else {
            return $this->surround('<button type="submit" class="btn primary-btn">'.$value.'</button>');
        }
    }
}
