<?php
    include 'inc_common.php';

    $g_title = '네카라쿠배';
    $js_array = ['js/home.js'];
    
    $menu_code = 'home';

    include 'inc_header.php';

?>
<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh - 257px)">
    <img class="w-50" src="../images/logo.svg" alt="">
    <div>
        <h3>관리자 페이지 입니다.</h3>
    </div>
</main>

<?php 
include 'inc_footer.php';
?>