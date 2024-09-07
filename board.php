<?php

$g_title = '네카라쿠배';
$js_array = ['js/board.js'];

$menu_code = 'board';

    include './inc/dbconfig.php';
    include './inc/lib.php';
    include './inc/board.php'; //회원 관리 class
    include './inc_header.php';

    $sn = (isset($_GET['sn']) && $_GET['sn'] != '' && is_numeric($_GET['sn'])) ? $_GET['sn'] : '';
    $sf = (isset($_GET['sf']) && $_GET['sf'] != '') ? $_GET['sf'] : '';

    $boar = new Board($db);

    $total = $boar->board_total();
    $limit = 5;
    $page_limit = 5;

    $paramArr = ['sn' => $sn, 'sf' => $sf];

    $page = (isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1; //is_numeric()는 주어진값이 숫자일때 참, 아니면 거짓

    $param = '';
    
    $memArr = $boar->board_list($page, $limit, $paramArr);

?>
<main class="w-100 mx-auto border rounded-5 p-5" style="height:calc(100vh - 257px);">
    <div class="container">
        <h3>게시판 관리</h3>
    </div>

    <table class="table table-border" style="">
        <tr>
            <th>번호</th>
            <th>타입</th>
            <th>게시판 이름</th>
            <th>등록일시</th>
            <th colspan="2" style="text-align:center">관리</th>
        </tr>
        <?php 
            foreach($memArr as $item){
        ?>
            <tr>
                <td><?= $item["idx"]?></td>
                <td><?= $item["btype"]?></td>
                <td><?= $item["name"]?></td>
                <td><?= $item["create_at"]?></td>
                <td><button class="btn btn-primary btn-sm mem_edit_btn" data-idx="<?= $item["idx"] ?>">수정</button></td>
                <td><button class="btn btn-danger btn-sm mem_del_btn" data-idx="<?= $item["idx"] ?>">삭제</button></td>
            </tr>
        <?php
            }
        ?>
    </table>


</main>
<div class="container mt-3 d-flex gap-2 w-50">
    <select class="form-select w-50" name="sn" id="sn">
        <option value="1">게시판 명</option>
    </select>
    <input type="text" class="form-contol w-25" id="sf" name="sf">
    <button class="btn btn-primary" id="btn_search">검색</button>
</div>
    <div class="d-flex mt-3" style="justify-content:space-between; align-items:start">
        <?php 
            echo my_pagination($total, $limit, $page_limit, $page, $param);
        ?>

        <button class="btn btn-primary" id="btn_board_input">
            게시판 생성
        </button>
    </div>

<?php 
include 'inc_footer.php';
?>