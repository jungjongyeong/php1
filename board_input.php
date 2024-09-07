<?php

$js_array = ['js/board_input.js'];
$g_title = '게시글 작성';

 include 'inc_header.php';
 ?>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<script>

</script>
<main class="w-100 mx-auto border rounded-5 p-5">
    <h1 class="text-center">게시글 등록</h1>
    <form name="input_form" method="post" autocomplete="off" enctype="multipart/form-data" action="pg/board_process.php">
        <input type="hidden" name="mode" value="boardinput">
            <div class="d-flex" style="justify-content: center; margin:0 0 20px">
                <input type="text" name="name" id="board_name" placeholder="제목을 입력해주세요." style="width:300px; text-align:center">
            </div>
            <div class="d-flex" style="justify-content: center; margin:0 0 20px">
                <select name="btype" id="btype">
                    <option value="board">게시판형</option>
                    <option value="gallery">겔러리형</option>
                </select>
            </div>
            <div class="d-flex" style="justify-content: center;">
                <textarea name="content" id="" cols="100" rows="10"></textarea>
            </div>
        <div class="mt-3 d-flex gap-2">
            <button type="button" class="btn btn-primary flex-grow-1" id="btn_board_submit">등록</button>
        </div>
    </form>
</main>

 <?php
 include 'inc_footer.php';
 ?>