<?php
namespace app\models;
use fw\core\base\Model;
class User extends Model
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'role' => '1',//тоисть обычный пользователь role=0 это забаненый
    ];
    public $attributes1 = [
        'newpassword' => '',
    ];
    public $attributes2 = [
        'title' => '',
        'content' =>'',
    ];
    public $rules = [
        'required' =>[
            ['login'],
            ['password'],
            ['confirmPassword'],
            ['name'],
        ],
        'lengthMin' =>[
            ['password',6],
            ['confirmPassword',6],
            ['login',4],
            
        ],
        'equals' => [
            ['password','confirmPassword'],
        ],
        'lengthMax' =>[
            ['login',11],
            ['password',40],
        ],
    ];
    public $rules1 = [
        'required' => [
            ['newpassword'],
        ],
        'lengthMin' =>[
            ['newpassword',6],
        ]
    ];
    public $rules2 = [
        'required' => [
            ['title'],
            ['content'],
        ],
        'lengthMin' =>[
            ['title',10],
            ['content',10],
        ],

        'lengthMax' =>[
                ['title',25],
                ['content',600],
            ]
        ];
    public function checkUnique()
    {
        $user = \R::findOne('user','login = ? LIMIT 1',[$this->attributes['login']]);
        if($user)
        {
            if($user->login = $this->attributes['login'])
            {
                $this->errors['unique'][] = "Этот логин уже занят";
            }
            return false;
        }
        return true;
    }
    public function login()
    {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password)
        {
            $user = \R::findOne('user','login= ? LIMIT 1',[$login]);
            $role = $user['role'];
            if($user)
            {
                if(password_verify($password,$user->password))
                {   
                    if($role == 1)
                    {
                        foreach($user as $k=> $v)
                        {
                        if($k != 'password')
                        {
                            $_SESSION['user'][$k] = $v;
                        }
                        }
                    }else if ($role == 0){
                        return false;
                    }
                    return true;
                }
            }
        }
        return false;
    }
    public function password($login)
    {
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        $newpassword = !empty(trim($_POST['newpassword'])) ? trim($_POST['newpassword']) : null;
        
        if($newpassword&&$password)
        {
            $user = \R::findOne('user','login= ? LIMIT 1',[$login]);
            if($user)
            {
                if(password_verify($password,$user->password))
                {
                    $user['password'] = password_hash($newpassword, PASSWORD_DEFAULT);
                    \R::store($user);
                    return true;
                }  
            }
        }
        return false;
    }
    public function login_delete($login)
    {
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password)
        {
            $user = \R::findOne('user','login= ? LIMIT 1',[$login]);
            if($user)
            {
                if(password_verify($password,$user->password)){
                    \R::trash($user);
                    unset($login);
                    return true;
                }
            }
        }
        return false;
    }
}