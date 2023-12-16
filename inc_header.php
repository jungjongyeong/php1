<?php
  header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <?php
            if(isset($js_array)){
                foreach ($js_array AS $var){
                    echo '<script src="'.$var.'?v='. date('YmdHis'). '"></script>'.PHP_EOL;
                }
            }
        ?>
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">

    <title><?= (isset($g_title) && $g_title != '') ? $g_title : '네카라쿠배'; ?></title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="images/logo.svg" style="width:2rem" class="me-2">
                <span class="fs-4">네카라쿠배</span>
            </a>

            <ul class="nav nav-pills">
                <?php 
                    if(isset($_SESSION['see_id']) && $see_id != '') {
                    //로그인 상태
                ?>
                    <li class="nav-item"><a href="index.php" class="nav-link <?= ($menu_code == 'home') ? 'active' : ''; ?>" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="company.php" class="nav-link <?= ($menu_code == 'company') ? 'active' : ''; ?>">회사소개</a></li>
                    <?php 
                        if($_SESSION['see_level'] == 10){                            
                    ?>
                        <li class="nav-item"><a href="./admin/index.php" class="nav-link <?= ($menu_code == 'member') ? 'active' : ''; ?>">관리자</a></li>
                    <?php 
                        } else{      
                    ?>
                        <li class="nav-item"><a href="mypage.php" class="nav-link <?= ($menu_code == 'member') ? 'active' : ''; ?>">My page</a></li>
                    <?php 
                        }
                    ?>
                    <li class="nav-item"><a href="board.php" class="nav-link <?= ($menu_code == 'board') ? 'active' : ''; ?>">게시판</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link <?= ($menu_code == 'logout') ? 'active' : ''; ?>">로그아웃</a></li>
                <?php
                    } else {
                    //로그인 안된상태
                ?>
                    <li class="nav-item"><a href="index.php" class="nav-link <?= ($menu_code == 'home') ? 'active' : ''; ?>" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="company.php" class="nav-link <?= ($menu_code == 'company') ? 'active' : ''; ?>">회사소개</a></li>
                    <li class="nav-item"><a href="stipulation.php" class="nav-link <?= ($menu_code == 'member') ? 'active' : ''; ?>">회원가입</a></li>
                    <li class="nav-item"><a href="board.php" class="nav-link <?= ($menu_code == 'board') ? 'active' : ''; ?>">게시판</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link <?= ($menu_code == 'login') ? 'active' : ''; ?>">로그인</a></li>
                <?php                                    
                    }
                ?>
            </ul>
        </header>