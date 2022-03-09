<?php
namespace app\controllers;
use app\models\User;

class UserController extends AppController
{
    public function signUpAction()
    {   
        $title = 'Регистрация';
        $this->set(compact('title'));
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) or !$user->checkUnique())
            {
                $user->getErrors();
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('user'))
            {
                $_SESSION['success'] = 'Вы успешно зарегистрировались';
                redirect('/public/user/profile');
            }else 
            {
                $_SESSION['error'] = 'Что-то пошло не так попробуйте позже';
                $_SESSION['id'] = false;
            }
            redirect();
            die;
        }
    }
    public function loginAction()
    {
        $title = 'Авторизация';
        $this->set(compact('title'));
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            if($user->login())
            {
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect('/public/user/profile');
            }else if($user->login() == false)
            {
                $_SESSION['error'] = 'Логин или пароль введены неверно(Или может быть вы забанены)';
            }
            redirect('/public/');
        }
    }
    public function logoutAction()
    {
        $title = ' ';
        $this->set(compact('title'));
        if(isset($_SESSION['user']))
        {   
            unset($_SESSION['user']);
            redirect('/public/user/login');
        }else
        {
            redirect('/public/');
        }
    }
    public function profileAction()
    {
        if(isset($_SESSION['user']))
        {   
            $title = 'Профиль';
            $login = $_SESSION['user']['login'];
            $name = $_SESSION['user']['name'];
            $date =$_SESSION['user']['date'];
            $avatar = $_SESSION['user']['avatar'];
            $this->set(compact('title','login','name','date','avatar'));

        }else
        {
            redirect('/public/user/login');
        }

    }
    public function deleteAction()
    {
            $login = $_SESSION['user']['login'];
            $title = 'Удалить аккаунт';
            $this->set(compact('title'));
            if (!empty($_POST))
            {
            $user = new User();
            $data = $_POST;
                if (!$user->login_delete($login))
                {   
                    $_SESSION['error'] = 'Пароль не правильный!';
                    redirect();
                }else
                {   
                    unset($_SESSION['user']);
                    redirect('/public/');
                    die;
                }
            }
    }
    public function changePasswordAction()
    {
        $login = $_SESSION['login'];
        $title = 'Изменить пароль';
        $this->set(compact('title'));
        if (!empty($_POST))
        {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate_password($data) or !$user->password($login))
            {
                $user->getErrors();
                redirect();
            }else
            {
                redirect();
                die;
            }
        }
    }
    public function uploadAvatarAction()
    {
        $title =' ';
        $user = new User();
        if(isset($_FILES['userfile']))
        {
            $check = $user->checkUpload($_FILES['userfile']);
            if($check == true){
                $user->makeUpload($_FILES['userfile']);
            }
        }else
        {
            $_SESSION['error'] = 'Вы не выбрали изображение';
        }
        $this->set(compact('title'));
    }
    
}
