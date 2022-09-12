<?php

include_once "../base.php";
$DB = new DB($_POST['table']);

$data = $DB->find($_POST['id']);
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $data['img'] = $_FILES['img']['name'];
}

$DB->save($data);
to("../back.php?do={$_POST['table']}");

?>