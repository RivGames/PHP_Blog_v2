<?php
namespace app\models;
use fw\core\base\Model;
class Post extends Model
{
    public $attributes2 = [
        'title' => '',
        'content' =>'',
        'author' =>'',
    ];
    public $rules2 = [
        'required' => [
            ['title'],
            ['content'],
        ],
        'lengthMin' =>[
            ['title',6],
            ['content',10],
        ],
        'lengthMax' =>[
            ['title',25],
            ['content',1000],
        ]
    ];
    public function myPosts($login)
    {
        $myposts = \R::findAll('posts','author = ?',[$login]);
        return $myposts;
    }
    public function delete_Post($post_id)
    {
        if($post_id)
        {
            \R::trash('posts',$post_id);
        }   
        redirect('/public/');
        return true;
    }
    // public function updatePost($post_id,$data)
    // {
    //     if($post_id && $data)
    //     {
    //         $old_data = \R::load('posts',$post_id);
    //         $old_data['title'] = $data['title'];
    //         $old_data['content'] = $data['content'];
    //         \R::store($old_data);
    //     }
    //     redirect('/public/');
    //     return true;
    // }
    public function updatePost($post_id,$newdata)
    {
        if($newdata && $post_id)
        {
            $old_data = \R::findOne('posts','id=?',[$post_id]);
            // $old_data['title'] = $newdata['title'];
            //$old_data['content'] = $newdata['content'];
            \R::store($old_data);
        }
        return true;
    }

}