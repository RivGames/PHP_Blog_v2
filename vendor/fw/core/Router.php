<?php
namespace fw\core;
use app\controllers;
use Exception;

class Router
{
    protected static $routes = [];
    protected static $route = [];
    public static function add($regexp,$route = [])
    {
        self::$routes[$regexp] = $route;

    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function matchRoute($url)
    {
        foreach(self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i",$url,$matches))
            {
                foreach($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $route[$k] = $v;
                    }
                }
                
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                //prefix for admin controllers
                if(!isset($route['prefix']))
                {
                    $route['prefix'] = '';
                }else
                {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    public static function dispatch($url)
    {
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\'. self::$route['prefix'] .self::$route['controller'] . 'Controller';
            if(class_exists($controller))
            {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj,$action))
                {
                    $cObj->$action();
                    $cObj->getView();
                }else
                {
                    throw new Exception("Метод <b> $controller::$action <b>не найден",404);
                }
            }else
            {
                throw new Exception("Контроллер <b>$controller</b>не найден!",404);
            }
        }
        else
        {
            throw new Exception("СТРАНИЦА НЕ НАЙДЕНА",404);
        }
    }
    protected static function upperCamelCase($name)
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }
}