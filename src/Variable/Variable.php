<?php

namespace edrard\Variable;

class Variable
{
    private static $data = array();

    public static function __callStatic($name, $arguments)
    {
        static::resset();
        $type = '_'.strtoupper($name);
        $params = $arguments[0];
        if(!is_array($params)){
            $params = array($params);
        }
        static::getData($type,$params);
        if(isset($arguments[1])){
            static::callableFunction($arguments[1]);
        }
        return static::$data;
    }




    private static function callableFunction($func){
        if(is_callable($func)){
            static::$data = call_user_func($func,static::$data);
        }
    }
    private static function getData(string $type,array $params){
        foreach($params as $param){
            if($param === '*'){
                static::getAll($type);
            }else{
                static::getParam($param,$type);
            }
        }
    }
    private static function getAll($type){
        if(isset($GLOBALS[$type])){
            static::$data = $GLOBALS[$type];
        }
    }
    private static function getParam($param,$type){
        if(isset($GLOBALS[$type]) && isset($GLOBALS[$type][$param])){
            static::$data[$param] = $GLOBALS[$type][$param];
        }
    }
    public static function getLast(){
        return static::$data;
    }
    public static function resset(){
        static::$data = array();
    }

}