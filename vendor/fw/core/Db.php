<?php
namespace fw\core;
use R;
/**
 * Класс Db
 * Подключение к базе данных,когда я первый раз использовал PDO
 * но мне больше понравилась ORM ReadBeanPHP
 */
class Db
{
    protected $pdo;
    protected static $instance;
    protected function __construct()
    {

        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb-mysql.php';
        R::setup('mysql:host=localhost;dbname=blog_v2', 'root', '');
        R::freeze(true);
        //R::fancyDebug(true);

    }

    public static function instance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
}  