<?php 
    include '../inc/dbconfig.php';
    include '../inc/member.php';

    $idx = (isset($_POST['idx']) && $_POST['idx'] != '') ? $_POST['idx'] : '';

    if($idx == ''){
        $arr = ["result" => "empty_idx"];
        die(json_encode($arr));
    }

    $mem = new Member($db);
    $mem->member_del($idx);

    $arr = ["result" => "success"];
    die(json_encode($arr));
?>