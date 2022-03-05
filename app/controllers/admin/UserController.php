<?php
namespace app\controllers\admin;

class UserController extends AppController
{
    public function indexAction()
    {
        $title = 'Админка главная страница';
        $this->set(compact('title'));
    }
    public function testAction()
    {
        
    }

}