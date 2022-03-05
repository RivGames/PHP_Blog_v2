<?php
namespace app\controllers;
use app\models\Post;
use fw\libs\Pagination;
use PDO;

class PostController extends AppController
{
    
    public function createArticleAction()
    {
    if(isset($_SESSION['user']))
    {
        $title = 'Создать статью';
        $this->set(compact('title'));
        if (!empty($_POST))
        {
            $post = new Post();
            $data = $_POST;
            $post->load_post($data);
            if (!$post->validate_post($data))
            {
                $post->getErrors();
                redirect();
            }
            if ($post->save_post('posts'))
            {
                $_SESSION['success'] = 'Вы успешно создали статью';
                redirect('/public/user/profile');
            }else 
            {
                $_SESSION['error'] = 'Что-то пошло не так попробуйте позже';
            }
            redirect();
            die;
            }
        }else
        {
        redirect('/public/user/login');
        } 
    }
    public function postsAction()
    {   
        $title = 'Посты';
        $post = new Post();
        $total = \R::count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 1;
        $pagination = new Pagination($page,$perpage,$total);
        $start = $pagination->getStart();
        $posts = \R::findAll('posts',"LIMIT $start,$perpage");
        $this->set(compact('title','posts','pagination','total'));
    }
    public function myPostsAction()
    {
        $title = 'Ваши посты';
        $login = $_SESSION['user']['login'];
        $post = new Post();
        $myposts = $post->myPosts($login);
        $total = \R::count('posts','author = ?',[$login]);
        $this->set(compact('title','myposts','total'));
    }
    public function actPostAction()
    {   
        $post = new Post();
        if($_POST['button'] == 'Удалить')
        {   
            $id_post = $_POST['id'];
            $title = ' ';
            $post->delete_Post($id_post);
            $this->set(compact('title','id_post'));
        }
    }
    public function changePostAction()
    {   
        $title = 'Редактировать пост';
        $this->set(compact('title'));
        $id_post = $_POST['id'];
        $data = $_POST;
        $post = new Post();
        $post->load_post($data);
        if (!empty($_POST))
        {
            $post = new Post();
            $data = $_POST;
            $post->load_post($data);
            // if (!$post->validate_post($data))
            // {
            //     $post->getErrors();
            //     redirect();
            // }
            if ($post->updatePost($id_post,$data))
            {
                $_SESSION['success'] = 'Вы успешно изменили пост';
                redirect('/public/user/profile');
            }else 
            {
                $_SESSION['error'] = 'Что-то пошло не так попробуйте позже';
            }
            redirect();
            die;
            }
        
    }
}