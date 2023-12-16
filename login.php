<?php
    session_start();

    $g_title = '로그인';
    $js_array = ['js/login.js'];
    
    $menu_code = 'login';

    if(isset($_SESSION['see_id'])){
        die("
         <script>
            self.location.href = 'index.php';
         </script>   
        ");
    };

    include 'inc_header.php';
?>
<main class="w-100 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh - 257px)">
    <form action="" class="w-25 mt-5 m-auto" method="post">
        <img src="./images/logo.svg" alt="" width="72">
        <h1 class="h3 mb-3">로그인</h1>
        <div class="form-floating mt-2" >
            <input type="text" class="form-control" id="f_id" placeholder="아이디 입력">
            <label for="f_id">아이디</label>
        </div>
        <div class="form-floating mt-2" >
            <input type="password" class="form-control" id="f_pw" placeholder="아이디 입력">
            <label for="f_pw">비밀번호</label>
        </div>
        <button class="w-100 mt-2 btn-lg btn btn-lg btn-primary" id="btn_login" type="button">확인</button>
    </form>
</main>

<?php 
include 'inc_footer.php';
?>