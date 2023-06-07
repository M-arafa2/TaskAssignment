<?php
// db info ,this class is inherited by the product class to keep data private
class db
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "testtt";
    private $port ="4306";

    protected function connect()
    {   // the try and catch are for the free hosting because there is no log there
        try {
            $dsn ='mysql:host=' . $this->host . ';port='. $this->port .';dbname='. $this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            return $pdo;
        } catch(Exception $ex) {
            die($ex->getMessage());
        }
    }
}
