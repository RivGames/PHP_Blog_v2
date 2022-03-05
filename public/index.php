<?php
use fw\core\Router;
use fw\core\ErrorHandler;
define('DEBUG',1);
define('WWW',__DIR__);
define('CORE',dirname(__DIR__).'/vendor/fw/core');
define('ROOT',dirname(__DIR__));
define('APP',dirname(__DIR__).'/app');
define('LAYOUT','default');
define('LIBS',dirname(__DIR__).'/vendor/fw/libs');

require '../vendor/fw/libs/functions.php';
require __DIR__ . '/../vendor/autoload.php';
new ErrorHandler();
$query = $_SERVER['REQUEST_URI'];
session_start();
//
//debug($_SESSION['user']['login']);
Router::add('^/public/post/posts/$',['controller' => 'Post','action'=>'posts']);
//admin
Router::add('^/public/admin/$',['controller' => 'User', 'action' => 'index','prefix' => 'admin']);
Router::add('^/public/admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',['prefix' => 'admin']);
//default
Router::add('^/public/$',['controller' => 'Main', 'action' => 'index']);
Router::add('^/public/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^/public/index.php$',['controller' => 'Main', 'action' => 'index']);
//
Router::dispatch($query);
