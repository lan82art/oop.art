<?php
/*
 * Реализовать 2 класса.
 * Первый: Должен при вызове определенных методов, в объекте,строить форму.
 * Второй: Должен валидировать поля по заданным параметрам.
 *
 * Задача должна упростить создание и валидацию форм. За пределами класса использовать HTML как можно меньше.
 *
 * Итог: Нужно создать абсолютно любую форму используя лишьметоды и валидировать ее передавая
 * лишь параметры валидации.*/

class Form {

    public function beginForm($name, $action, $method){
        return '<form name="'.$name.'" action="'.$action.'" method="'.$method.'">';
    }
    public function input($name, $type,$value=''){
        if($value == ''){
            return '<input name ="'.$name.'" type="'.$type.'"/>';
        } else {
        return '<input name ="'.$name.'" type="'.$type.'" value="'.$value.'"/>';
        }
    }

    public function textarea($name,$value){
        if($value != ''){
            return '<textarea name ="'.$name.'">'.$value.'</textarea>';
        } else {
            return '<textarea name ="'.$name.'"></textarea>';
        }

    }
    public function select($name, $values){
        $select = '<select>';
        foreach ($values as $value){
            $select .= '<option value="'.$value.'">'.$value.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
    public function endForm(){
        return '</form>';
    }

}
class Validate {

    protected $charset = 'utf8';
    protected $types = array('email','text','number');

    public function valid($type, $value){
        if (!empty($value) && in_array($type,$this->types)) {
            return $this->$type($value);
        } else return false;
    }

    protected function email($value){
            $dog_quantity = mb_substr_count(trim($value), '@', $this->charset);

            if ($dog_quantity == 1) {
                return true;
            } else {
                return false;
            }
    }

    protected function text($value){
        $str_len = mb_strlen($value,$this->charset);
        if ($str_len > 4 && $str_len < 20) {
            return true;
        } else
            return false;
    }

    protected function number($value){
        if (is_numeric($value)){
            return true;
        } else {
            return false;
        }
    }
}