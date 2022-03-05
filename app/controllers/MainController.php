<?php
namespace app\controllers;

use app\models\Main;
use R;
class MainController extends AppController
{
    // public $layout = 'default';
    public function indexAction()
    {   
    /*
        //$res = $model->query("CREATE TABLE poststest SELECT * FROM blog.articles");
        //$posts = $model->findAll();
        // $post = $model->findOne('php','title');
        // $post = $model->findOne(6);
        // $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
        // $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?",[
        //     '%php%'
        // ]);
        //$data1 = $model->findLike('php','content');
        //debug($data1);
        //$this->view = '';//.php
        // $text = 'PHP';
        // $languages = ['JS','C++'];
        //$this->set(compact('text','languages','title'));
        //$this->set(compact('title','posts'));
    */  
        // $model = new Main();
        // $posts = R::findAll('posts');
        // $menu = R::findAll('category');
        $title = 'Main';
        $this->set(compact('title'));
        
    }
    public function notindexAction()
    {   
        // $title = 'Main';
        // $t1 = 1;
        // $this->set(compact('title','t1'));
    }
}