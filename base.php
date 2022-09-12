<?php

session_start();
date_default_timezone_set("Asia/Taipei");

class DB
{

    public $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=b01";
    protected $pdo;

    function __construct($table)
    {

        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = " SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value'";
                }
                $sql .= " WHERE " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    {
        $sql = " SELECT * FROM $this->table WHERE";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = " `$key` = '$value'";
            }
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = '$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            foreach ($array as $key => $value) {
                $tmp[] = " `$key` = '$value'";
            }
            $sql = " UPDATE $this->table set " . join(',', $tmp) . " WHERE `id`= '{$array['id']}'";
        } else {
            $sql = " INSERT into $this->table(`".join("`,`",array_keys($array))."`) values('".join("','",$array)."') ";
        }
        return $this->pdo->exec($sql);
    }

    function del($arg)
    {
        $sql = " DELETE FROM $this->table WHERE";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = " `$key` = '$value'";
            }
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = '$arg'";
        }
        return $this->pdo->exec($sql);
    }

    function math($math, $col, ...$arg)
    {
        $sql = " SELECT $math($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value'";
                }
                $sql .= " WHERE " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
}

class Str{
    public $header;
    public $tdHeader;
    public $updateBtn;
    public $updateModal;
    public $addBtn;
    public $addModalHeader;
    public $addModalCol;
    public $table;

    function __construct($table){

        $this->table = $table;
        switch($table){
            case "title":
                $this->header = "網站標題管理"; 
                $this->tdHeader = ["網站標題","替代文字"]; 
                $this->updateBtn = "更新圖片"; 
                $this->updateModal = ["更新網站標題圖片","標題區圖片 :"]; 
                $this->addBtn = "新增網站標題圖片"; 
                $this->addModalHeader = "新增標題區圖片"; 
                $this->addModalCol = ["標題區圖片 :","標題區替代文字 :"]; 
            break;
            case "ad":
                $this->header = "動態文字廣告管理"; 
                $this->tdHeader = ["動態文字廣告"]; 
                $this->addBtn = "新增動態文字廣告"; 
                $this->addModalHeader = "新增動態文字廣告"; 
                $this->addModalCol = ["動態文字廣告 :"]; 
            break;
            case "mvim":
                $this->header = "動畫圖片管理"; 
                $this->tdHeader = ["動畫圖片"]; 
                $this->updateBtn = "更換動畫"; 
                $this->updateModal = ["更換動畫圖片","動畫圖片 :"]; 
                $this->addBtn = "新增動畫圖片"; 
                $this->addModalHeader = "新增動畫圖片"; 
                $this->addModalCol = ["動畫圖片 :"]; 
            break;
            case "image":
                $this->header = "校園映像資料管理"; 
                $this->tdHeader = ["校園映像資料圖片"]; 
                $this->updateBtn = "更換圖片"; 
                $this->updateModal = ["更換校園映像圖片","校園映像圖片"]; 
                $this->addBtn = "新增校園映像圖片"; 
                $this->addModalHeader = "新增校園映像圖片"; 
                $this->addModalCol = ["校園映像圖片 :"]; 
            break;
            case "total":
                $this->header = "進站總人數管理"; 
                $this->tdHeader = ["進站總人數 :"]; 
            break;
            case "bottom":
                $this->header = "頁尾版權資料管理"; 
                $this->tdHeader = ["頁尾版權資料 :"]; 
            break;
            case "news":
                $this->header = "最新消息資料管理"; 
                $this->tdHeader = ["最新消息資料內容"]; 
                $this->addBtn = "新增最新消息資料"; 
                $this->addModalHeader = "新增最新消息資料"; 
                $this->addModalCol = ["最新消息資料 :"]; 
            break;
            case "admin":
                $this->header = "管理者帳號管理"; 
                $this->tdHeader = ["帳號","密碼"]; 
                $this->addBtn = "新增管理者帳號"; 
                $this->addModalHeader = "新增管理者帳號"; 
                $this->addModalCol = ["帳號","密碼"]; 
            break;
            case "menu":
                $this->header = "選單管理"; 
                $this->tdHeader = ["主選單名稱","選單連結網址","次選單數"]; 
                $this->updateBtn = "編輯次選單"; 
                $this->updateModal = ["編輯次選單","次選單名稱","次選單連結網址"]; 
                $this->addBtn = "新增主選單"; 
                $this->addModalHeader = "新增主選單"; 
                $this->addModalCol = ["主選單名稱 :","選單連結網址 :"]; 
            break;
        }
    }
}

$Total = new DB('total');
$Ad = new DB('ad');
$Bottom = new DB('bottom');
$Mvim = new DB('mvim');
$Image = new DB('image');
$Admin = new DB('admin');
$News = new DB('news');
$Menu = new DB('menu');
$Title = new DB('title');

if(isset($do)){
    $Str = new Str($do);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

if (!isset($_SESSION['total'])) {
    $total = $Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total'] = 1;
}
