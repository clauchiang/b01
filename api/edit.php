<?php

include_once "../base.php";
$DB = new DB($_POST['table']);

dd($_POST);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $data = $DB->find($id);
            switch($_POST['table']){
                case "title":
                    $data['text'] = $_POST['text'][$key];
                    $data['hidden'] = (isset($_POST['hidden']) && $_POST['hidden'] == $id)?1:0;
                break;
                case "ad":
                case "news":
                    $data['text'] = $_POST['text'][$key];
                    $data['hidden'] = (isset($_POST['hidden']) && in_array($id,$_POST['hidden']))?1:0;
                break;
                case "mvim":
                case "image":
                    $data['hidden'] = (isset($_POST['hidden']) && in_array($id,$_POST['hidden']))?1:0;
                break;
                case "admin":
                    $data['acc'] = $_POST['acc'][$key];
                    $data['pw'] = $_POST['pw'][$key];
                break;
                case "menu":
                    $data['text'] = $_POST['text'][$key];
                    $data['href'] = $_POST['href'][$key];
                    $data['hidden'] = (isset($_POST['hidden']) && in_array($id,$_POST['hidden']))?1:0;
                break;
            }
            $DB->save($data);
        }
    }
}

to("../back.php?do={$_POST['table']}");

?>