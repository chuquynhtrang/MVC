<?php
require_once 'Database.php';
require_once 'Model.php';
class UserModel extends Model
{
    public function __construct($table)
    {
        parent::__construct($table);
    }

    public function checkLogin($username, $password)
    {
        $query = "SELECT id,username, password FROM $this->table WHERE username = '$username' AND password = '$password'";
//        var_dump($query);
        //var_dump($this->cont);
        var_dump($this->cont->query($query));
        $result = $this->cont->query($query);
        var_dump($result);
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    }
}
