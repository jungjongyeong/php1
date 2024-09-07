<?php
session_start();
include '../inc/dbconfig.php';
include '../inc/member.php';

$idx = (isset($_GET['idx']) && $_GET['idx'] != '') ? $_GET['idx'] : '';

$mem = new Member($db);
$memArr = $mem->getInfoFormIdx($idx);
$menu_code = 'member';

$js_array = ['js/member_edit.js'];
$g_title = '회원정보수정';

/* 값이 존재하면 알랏창이 안뜨고 값이 없으면 알랏창이 뜨게 하는 코드 */

 include 'inc_header.php';
 ?>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<main class="w-150 mx-auto border rounded-5 p-5">
    <h1 class="text-center">회원정보수정</h1>
    <form name="input_form" method="post" autocomplete="off" enctype="multipart/form-data" action="../pg/member_process.php">
        <input type="hidden" name="mode" value="edit">
        <input type="hidden" name="idx" value="<?= $idx?>">
        <input type="hidden" name="old_email" value="<?= $memArr['id'] ?>">
        <input type="hidden" name="address_chk" value="0">
        <input type="hidden" name="email_chk" value="0">
        <div class="d-flex gap-2 align-items-end">
            <div>
                <label for="f_id" class="form-label">아이디</label>
                <input type="text" value="<?= $memArr['id']?>" name="id" class="form-control" id="f_id" placeholder="아이디를 입력해 주세요.">
            </div>
        </div>
        <div class="d-flex gap-2 align-items-end">
            <div>
                <label for="f_name" class="form-label">이름</label>
                <input type="text" name="name" class="form-control" id="f_name" placeholder="이름을 입력해 주세요." value="<?= $memArr['name']?>">
            </div>
        </div>
        <div class="d-flex mt-3 gap-2 justify-content-between">
            <div class="flex-grow-1">
                <label for="exampleInputpassword" class="form-label">비밀번호</label>
                <input type="password" name="password" class="form-control" id="exampleInputpassword" placeholder="비밀번호를 입력해 주세요.">
            </div>
            <div class="flex-grow-1">
                <label for="exampleInputpassword2" class="form-label">비밀번호 확인</label>
                <input type="password" name="password2" class="form-control" id="exampleInputpassword2" placeholder="비밀번호를 입력해 주세요.">
            </div>
        </div>
        <div class="d-flex gap-2 align-items-end mt-3">
            <div class="flex-grow-1">
                <label for="f_id" class="form-label">이메일</label>
                <input type="text" class="form-control" value="<?= $memArr['email']?>" name="email" id="f_email" placeholder="이메일을 입력해 주세요.">

            </div>
            <button type="button" class="btn btn-secondary" id="btn_email_check">
            이메일 중복확인
            </button>
        </div>
        <div class="mt-3 d-flex align-items-end gap-3">
            <div>
                <label for="f_zipcode">우편번호</label>
                <input type="text" name="zipcode" id="zipcode" value="<?= $memArr['zipcod']?>" class="form-control" maxlength="5" minlength="5" readonly>
            </div>
            <button type="button" class="btn btn-secondary mt-3" id="btn_zipcode">우편번호 찾기</button>
        </div>

        <div class="d-flex mt-3 gap-2 justify-content-between">
            <div class="flex-grow-1">
                <label for="exampleInputaddress" class="form-label">주소</label>
                <input type="text" name="addr1" value="<?= $memArr['addr1']?>" class="form-control" id="Inputaddress" placeholder="주소를 입력해 주세요.">
            </div>
            <div class="flex-grow-1">
                <label for="exampleInputaddress2" class="form-label">상세주소</label>
                <input type="text" name="addr2" class="form-control" value="<?= $memArr['addr2']?>" id="Inputaddress2" placeholder="상세주소를 입력해 주세요.">
            </div>
        </div>

        <div class="mt-3 d-flex gap-5">
            <div>
                <label for="f_photo" class="form-label">프로필 이미지</label>
                <input type="file" name="photo" id="f_photo" class="form-control">
            </div>
            <img src="../images/person.svg" alt="profile image" class="w-25" id="f_preview">
        </div>

        <div class="mt-3 d-flex gap-2">
            <button type="button" class="btn btn-primary flex-grow-1" id="btn_submit">수정</button>
            <button type="button" class="btn btn-secondary flex-grow-1">취소</button>
        </div>
    </form>
</main>