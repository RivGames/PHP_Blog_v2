<?php
namespace fw\core\base;
use fw\core\Db;
use Valitron\Validator;
abstract class Model
{   
    protected $pdo;
    protected $table;
    public $attributes;
    public $attributes2;
    public $errors = [];
    public $rules = [];
    public $rules2 =[];
    public function __construct()
    {
        $this->pdo = Db::instance();
    }
    public function load($data)
    {
        foreach($this->attributes as $name => $value)
        {
            if(isset($data[$name]))
            {
                $this->attributes[$name] = $data[$name];
            }
        }
    }
    public function load_post($data)
    {
        foreach($this->attributes2 as $name => $value)
        {
            if(isset($data[$name]))
            {
                $this->attributes2[$name] = $data[$name];
            }
        }
    }
    public function save($table)
    {
        $table = \R::dispense($table);
        foreach($this->attributes as $name => $value)
        {
            $table->$name = $value;
            $date = date('y-m-d');
            $avatar = 'uploads\avatars\default_avatar.jpg';
            $table->avatar = $avatar;
            $table->date = $date;
        }
        return \R::store($table);
    }
    public function save_post($table)
    {
        $table = \R::dispense($table);
        foreach($this->attributes2 as $name => $value)
        {
            $table->$name = $value;
            $login = $_SESSION['user']['login'];
            $table->author = $login;
            $date = date('y-m-d');
            $table->date = $date;
        }
        return \R::store($table);
    }
    public function validate_post($data)
    {
        $v = new Validator($data);
        $v->rules($this->rules2);
        if($v->validate())
        {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    public function validate($data)
    {
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    public function validate_password($data){
        $v = new Validator($data);
        $v->rules($this->rules1);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    public function getErrors()
    {
        $errors = '<ul>';
        foreach($this->errors as $error){
            foreach($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }   
    
}