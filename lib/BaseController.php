<?php
session_start();
define('NUMBER_RECORD',5);
class BaseController{
    public function view($name,$data=array()){
//        var_dump($data);
        extract($data);
        return require_once ('View/'.$name.'.php');
    }

    //$table: bang csdl duoc chon, $model: dung class $model nao, $column_search: cot nao dung de search, $select: chon list hien thi
    public function indexBase($table,$model,$column_search,$select,$href)
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $page = $_GET['page'];
            $md = new $model($table);
            $dt = $md->search($column_search, $search);
            $totalRecord = $dt->num_rows;
            $pagination = new Pagination($totalRecord,NUMBER_RECORD,$page);
            $link = $pagination->paginationPanel($href);
            $offset = $pagination->getOffset();
            $dt1 = $md->searchLimit($column_search,$search,$offset,NUMBER_RECORD);
            $this->view('list-' . $select, ['list_' . $select => $dt1,'link' => $link]);
        } else {
            $md = new $model($table);
            $dt = $md->getAll('*');
            $page = $_GET['page'];
            $totalRecord = $dt->num_rows;
            $pagination = new Pagination($totalRecord,NUMBER_RECORD,$page);
            $link = $pagination->paginationPanel($href);
            $offset = $pagination->getOffset();
            $dt1 = $md->getAllLimit($offset,NUMBER_RECORD);
            $this->view('list-' . $select, ['list_' . $select => $dt1,'link' => $link]);
        }
    }

    public function viewAdd($select)
    {
        $this->view('add-' . $select);
    }

    public function add($table,$model,$post=array())
    {
        $md = new $model($table);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['create'])) {
                $array = array_values($post);
                $file_path = 'upload/'.$array[0];
                if (isset($_FILES['avatar'])) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $file_path.'.jpg');
                }
                $md->insert($post);
            }
        }
    }
    public function handleBase($table,$model)
    {
        $md = new $model($table);
        $id = $_POST['checkbox'];
        if (isset($_POST['delete'])) {
            foreach ($id as $i) {
                $md->delete($i);
            }
        } else
            if (isset($_POST['activate'])) {
                foreach ($id as $i) {
                    $md->activate($i);
                }
            }
    }

    public function viewEdit($table,$model,$select)
    {
        $md = new $model($table);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $md->getBy('*','id',$id);
            $data = $result->fetch_assoc();
            $this->view('edit-'.$select, $data);
        }
    }

    public function edit($table,$model,$post=array())
    {
        $md = new $model($table);
        $id = $_GET['id'];
        $result = $md->getBy('*','id',$id);
        $row = $result->fetch_assoc();
        $a = array_values($row);
        $name = $a[1];
//        var_dump($name);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['update'])) {
                $array = array_values($post);
                $file_path = 'upload/'.$array[0].'.jpg';
                var_dump($file_path);
                $file_path1 = 'upload/' . $name . '.jpg';
                var_dump($file_path1);
                if($_FILES['avatar']['name']){
                    if(file_exists($file_path1)){
                        unlink($file_path1);
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$file_path);
                } else
                    rename($file_path1,$file_path);
                $md->update($id, $post);
            }
        }
    }

    public function sort($table,$model,$select,$sort,$href)
    {
        $order = $_GET['order'];
        $md = new $model($table);
        $dt = $md->getAll('*');
        $page = $_GET['page'];
        $totalRecord = $dt->num_rows;
        $pagination = new Pagination($totalRecord,NUMBER_RECORD,$page);
        $link = $pagination->paginationPanel($href);
        $offset = $pagination->getOffset();
        $dt1 = $md->sortBy($sort,$order, $offset, NUMBER_RECORD);
        $this->view('list-'.$select, ['list_'.$select => $dt1,'link' => $link]);
    }
}