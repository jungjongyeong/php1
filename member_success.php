<?php
    $g_title = '회원가입을 축하드립니다.';
    $js_array = ['js/member_success.js'];
    
    include 'inc_header.php';
?>
<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh - 257px)">
    <img class="w-50" src="images/logo.svg" alt="">
    <div>
        <h3>회원 가입을 축하드립니다.</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia fugiat necessitatibus neque, suscipit error rem dicta in deserunt, odio labore recusandae esse atque quae quisquam beatae, exercitationem eos magnam dolore.</p>
        <button class="btn btn-primary" id="btn_login">로그인 하기</button>
    </div>
</main>

<?php 
include 'inc_footer.php';
?>