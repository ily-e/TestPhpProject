<?php


class OraConnect
{
    private static $instance = null;
    private $oraconnect;

    public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new OraConnect();
        }
    }

}