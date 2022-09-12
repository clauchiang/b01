<?php

include_once "../base.php";
$DB = new DB($_POST['table']);

dd($_POST);

$data = [];
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $data['img'] = $_FILES['img']['name'];
}

switch($_POST['table']){
    case "title":
        $data['text'] = $_POST['text'];
        $data['hidden'] = 0;
    break;
    case "ad":
    case "news":
        $data['text'] = $_POST['text'];
        $data['hidden'] = 1;
    break;
    case "admin":
        $data['acc'] = $_POST['acc'];
        $data['pw'] = $_POST['pw'];
    break;
    case "menu":
        $data['text'] = $_POST['text'];
        $data['href'] = $_POST['href'];
        $data['hidden'] = 1;
    break;
}

$DB->save($data);
to("../back.php?do={$_POST['table']}");

?>