<?php

class MysqlConnection
{

    private $user;
    private $host;
    private $pass;
    private $db;

    public function __construct()
    {
        $this->user = "php_user";
        $this->host = "localhost";
        $this->pass = "123";
        $this->db = "login";
    }


    public function connect()
    {
        return new mysqli($this->host, $this->user, $this->pass, $this->db);
    }


    public function getConnection()
    {
        return $this->connect();

    }
}


