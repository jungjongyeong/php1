<?php 
    include '../inc/dbconfig.php';
    include '../inc/Board.php';

    $boar = new Board($db);
    $name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
    $btype = (isset($_POST['btype']) && $_POST['btype'] != '') ? $_POST['btype'] : '';
    $content = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : '';
    $mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

    if($mode == 'boardinput'){ 
        
        $arr = [
            'name' => $name,
            'btype' => $btype,
            'content' => $content,
        ];

        $boar->board_input($arr);

        echo "
        <script>
            self.location.href='../board.php'
        </script>
        ";
    } 

