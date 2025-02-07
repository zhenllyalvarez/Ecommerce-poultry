<?php

class Database
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $status;
    private $connection;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "e_commerce";
        $this->status = false;
        $this->connection = $this->Initialize();
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        return $this->connection = null;
    }

    public function Initialize()
    {
        try {
            $catch = new PDO("mysql:host=$this->host;dbname=" . $this->database, $this->user, $this->password);
            $catch->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;
            return $catch;
        } catch (PDOException $e) {
            return "Connection failed" . $e->getMessage();
        }
    }
}
