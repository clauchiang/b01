<?php

include_once "../base.php";
$DB = new DB($_POST['table']);

$data = $DB->find(1);

switch($_POST['table']){
    case "total":
        $data['total'] = $_POST['total'];
        $DB->save($data);
    break;
    case "bottom":
        $data['bottom'] = $_POST['bottom'];
        $DB->save($data);
    break;
}

to("../back.php?do={$_POST['table']}");

?>