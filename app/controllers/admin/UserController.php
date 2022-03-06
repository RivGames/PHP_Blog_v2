<?php
namespace app\controllers\admin;
use app\models\Admin;
use app\models\Post;
class UserController extends AppController
{       
    public function indexAction()
    {
        $title = 'Админка главная страница';
        $admin = new Admin();
        $posts = $admin->showAllPosts();
        $users = $admin->showAllUsers();
        $banned_users = $admin->showBannedUsers();
        $this->set(compact('title','posts','users','banned_users'));
    }
    public function banAction()
    {
        $title = ' ';
        $admin = new Admin();
        $users = $admin->ban($_POST['id']);
        $this->set(compact('title'));
    }
    public function unBanAction()
    {
        $title = ' ';
        $admin = new Admin();
        $users = $admin->unBan($_POST['id']);
        $this->set(compact('title'));
    }

}