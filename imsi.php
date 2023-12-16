<?php

// db 연결
include 'inc/dbconfig.php';
include 'inc/member.php';

// 이메일이 중복 테스트 


$email = 'emailasdde123';

$mem = new Member($db);

if ( $mem->email_exists($email)){
//    echo "이메일이 중복됩니다." ;
} else {
    // echo "사용할 수 있는 이메일입니다.";
}


$email = 'ddd@dddd.com';

$rs = filter_var($email, FILTER_VALIDATE_EMAIL);

echo var_dump($rs);