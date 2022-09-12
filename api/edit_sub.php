<?php

include_once "../base.php";
$DB = new DB($_POST['table']);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $row = $DB->find($id);
            $row['text'] = $_POST['text'][$key];
            $row['href'] = $_POST['href'][$key];
            $DB->save($row);
        }
    }
}

if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $key => $text){
        if($text != ""){
            $data = [];
            $data['text'] = $text;
            $data['href'] = $_POST['href2'][$key];
            $data['main_id'] = $_POST['main_id'];
            $DB->save($data);
        }
    }
}

to("../back.php?do={$_POST['table']}");

?>