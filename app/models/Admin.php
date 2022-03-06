<?php
namespace app\models;
use fw\core\base\Model;
use R;
class Admin extends Model
{
    public function showAllUsers()
    {
        $users = \R::findAll('user','role = 1 OR role=2');
        return $users;
    }
    public function showBannedUsers()
    {
        $users = \R::findAll('user','role = 0');
        return $users;
    }
    public function showAllPosts(){
        $posts = \R::findAll('posts');
        return $posts;
    }
    public function ban($id)
    {   
        if($id !== $_SESSION['user']['id']){
            $user = \R::findOne('user','id=?',[$id]);
            $user['role'] = 0;
            \R::store($user);
            return true;
        }else{
            return false;
        }
    }
    public function unBan($id)
    {
        $user = \R::findOne('user','id=?',[$id]);
        $user['role'] = 1;
        \R::store($user);
        return true;
    }
    
}