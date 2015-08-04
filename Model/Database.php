<?php
class Database
{
    private $dbname = 'management' ;
    private $host = 'localhost' ;
    private $username = 'root';
    private $password = '';

    public $cont  = null;

    public function __construct() {
        //exit('Init function is not allowed');
        $this->connect();
//        var_dump($this->cont);
    }

    public function connect()
    {
        // One connection through whole application
        if ( null == $this->cont )
        {
            try
            {
                $this->cont =  new mysqli($this->host,$this->username,$this->password,$this->dbname);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        return $this->cont;
    }

    public function disconnect()
    {
        $this->cont = null;
    }
}