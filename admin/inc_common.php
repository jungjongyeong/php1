<?php 
    session_start();
    
    $see_id = (isset($_SESSION['see_id']) && $_SESSION['see_id'] != '') ? $_SESSION['see_id'] : '';
    $see_level = (isset($_SESSION['see_level']) && $_SESSION['see_level'] != '') ? $_SESSION['see_level'] : '';

    if($see_level != 10 || $see_id == ''){
        die("
         <script>
            alert('관리자만 접근 가능합니다.');
            self.location.href = '../';
         </script>   
        ");
    }
?>