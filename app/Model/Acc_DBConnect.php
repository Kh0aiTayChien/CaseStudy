<?php

use PDO;
class accdbconnect
{
    private $dsn;
    private $username;
    private $pass;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=logindemo;charset=utf8';
        $this->username = 'leminhchien';
        $this->pass = 'password';
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn,$this->username,$this->pass);
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
}
}