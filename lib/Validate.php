<?php
/**
 * Created by PhpStorm.
 * User: Trang
 * Date: 8/4/2015
 * Time: 1:40 PM
 */
class Validate
{
    public $error = array();
    private $rule;

    public function __construct($rule)
    {
        $this->rule = $rule;
    }
    public function execute()
    {
        foreach($this->rule as $key => $value){
            foreach($value as $law) {
                if ($this->$law($_REQUEST[$key],$key)){
                    $notice = $this->$law($_POST[$key],$key);
                    $this -> error[$key] = $notice;
                    break;
                }
            }
        }
        return $this->error;
    }

    public function password($value,$key)
    {
        $pattern = '/^[a-zA-Z0-9]+$/';
        $message = '';
        if(!preg_match($pattern,$value)){
            $message = 'Wrong character of '.$key;
        }
        return $message;
    }

    public function required($value,$key)
    {
        $message = '';
        if(empty($value)){
            $message = 'Do not blank '.$key;
        }
        return $message;
    }

    public function username($value,$key)
    {
        $pattern = '/^[A-zA-Z]*$/';
        $message = '';
        if(!preg_match($pattern,$value)){
            $message = 'Wrong character of '.$key;
        }
        return $message;
    }

    public function min($value,$key)
    {
        $message = '';
        $pattern = '/^[a-zA-Z0-9]{8,}$/';
        if(!preg_match($pattern,$value)){
            $message = $key . ' must be at least 8 characters';
        }
        return $message;
    }

    public function max($value,$key)
    {
        $message = '';
        $pattern = '/^[a-zA-Z0-9]{8,32}$/';
        if(!preg_match($pattern,$value)){
            $message = $key . ' must be at most 32 characters';
        }
        return $message;
    }

    public function email($value,$key)
    {
        $message = '';
        if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
            $message = 'Invalid form '.$key;
        }
        return $message;
    }
}