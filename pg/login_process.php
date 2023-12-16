<?php

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : "";
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : "";

if($id == ''){
    $arr = ['result' => "empty_id"];
    die(json_encode($arr));
}

if($pw == ''){
    $arr = ['result' => "empty_id"];
    die(json_encode($arr));
}

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

if($mem->login($id, $pw)) {
    $arr = ['result' => "login_success"];

    $memArr = $mem->getInfo($id);
    
    session_start();

    $_SESSION['see_id'] = $id;
    $_SESSION['see_level'] = $memArr['level'];

    // $_SESSION["세션이름"] = "php세션값"; 이렇게하면 세션으로 저장됨
    // $value = $_SESSION["세션이름"]; 이런식으로 세션 데이터를 가져올수 있음.
    // session_unregister(세션이름)을 이용하면 특정 세션 값을 삭제
    // session_destroy() 는 모든 등록된 세션을 삭제
}else {
    $arr = ['result' => "login_fail"];
}

die(json_encode($arr));

