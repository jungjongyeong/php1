<?php 

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

$rs = $mem->excel();

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=member.xls");
header("Content-Description: PHP8 Generated Data");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>아이디</td>
        <td>이름</td>
        <td>이메일</td>
        <td>우편번호</td>
        <td>주소</td>
        <td>등록일시</td>
    </tr>
<?php 
foreach($rs as $row){
    echo '
        <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['zipcod'].'</td>
            <td>'.$row['addr1'].' '.$row['addr2'].'</td>
            <td>'.$row['id'].'</td>
        </tr>
    ';  
}
?>
</table>
</body>
</html>
