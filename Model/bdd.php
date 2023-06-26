<?php
namespace Model;

class Bdd
{
    public $connect;
    private static $instance;

    private function __construct()
    {
        $this->connect = new \PDO("mysql:dbname=sell_me_out;host=localhost", "root", "");
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Bdd();
        }
        return self::$instance;
    }
}