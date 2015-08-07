<?php
include_once 'Database.php';
/**
 * Created by PhpStorm.
 * User: Trang
 * Date: 7/23/2015
 * Time: 11:27 AM
 */
class Model extends Database
{
    protected $table;

    //constructor
    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    //get all list table
    public function getAll($select)
    {
        $query = "SELECT $select FROM $this->table";
        $result = $this->cont->query($query);
        return $result;
    }

    //get all limit
    public function getAllLimit($offset,$step){
        $query = "SELECT * FROM $this->table LIMIT $offset,$step";
        $result = $this->cont->query($query);
        return $result;
    }

    //get all by id
    public function getBy($select,$column,$dt)
    {
        $query = "SELECT $select FROM $this->table WHERE $column = '$dt'";
        $result = $this->cont->query($query);
        return $result;
    }

    //insert database
    public function insert($dt=array())
    {
        $column = implode(',',array_keys($dt));
        $value = array_values($dt);
        $query = "INSERT INTO $this->table($column) VALUES (";
        for($i=0;$i<sizeof($value);$i++) {
            if($i!=0) {
                $query .= ',';
            }
            $query .= "'$value[$i]'";
        }
        $query .= ")";
        $result = $this->cont->query($query);
        return $result;
    }

    //update database
    public function update($id,$dt=array())
    {
        $column = array_keys($dt);
        $value = array_values($dt);
        $query = "UPDATE $this->table SET ";
        for ($i = 0; $i < sizeof($column); $i++) {
            if($i!=0 && $i!= sizeof($column)){
                $query .= ',';
            }
            $query .= "$column[$i] = '$value[$i]'";
        }
        $query .= " WHERE id = $id";
//        var_dump($query);
        $result = $this->cont->query($query);
        return $result;
    }

    //delete database
    public function delete($id){
        $query = "DELETE FROM $this->table WHERE id = $id";
        $result = $this->cont->query($query);
        return $result;
    }

    //activate database
    public function activate($id){
        $query = "UPDATE $this->table SET activate = 1 WHERE id = $id";
        $result = $this->cont->query($query);
        return $result;
    }

    //sort by column
    public function sortBy($column,$order,$offset,$step)
    {
        $query = "SELECT * FROM $this->table ORDER BY $column $order LIMIT $offset,$step";
        $result = $this->cont->query($query);
        return $result;
    }

    public function sortBySearch($search,$column_search,$column,$order,$offset,$step)
    {
        $query = "SELECT * FROM $this->table WHERE $column_search LIKE '%$search%' ORDER BY $column $order LIMIT $offset,$step";
        $result = $this->cont->query($query);
        return $result;
    }
    //search by column
    public function search($column,$search){
        $query = "SELECT * FROM $this->table WHERE $column LIKE '%$search%'";
        $result = $this->cont->query($query);
        return $result;
    }

    //search by column limit
    public function searchLimit($column,$search,$offset,$step){
        $query = "SELECT * FROM $this->table WHERE $column LIKE '%$search%' LIMIT $offset,$step";
        $result = $this->cont->query($query);
        return $result;
    }
}
