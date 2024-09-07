<?php 
    include '../inc/dbconfig.php';
    include '../inc/member.php';

    $mem = new Member($db);
    $idx = (isset($_POST['idx']) && $_POST['idx'] != '') ? $_POST['idx'] : '';
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
    $email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
    $password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
    $name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
    $zipcode = (isset($_POST['zipcode']) && $_POST['zipcode'] != '') ? $_POST['zipcode'] : '';
    $addr1 = (isset($_POST['addr1']) && $_POST['addr1'] != '') ? $_POST['addr1'] : '';
    $addr2 = (isset($_POST['addr2']) && $_POST['addr2'] != '') ? $_POST['addr2'] : '';

    $mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

    if($mode == 'id_chk'){ 
        
        if($id == ''){
            die(json_encode(['result' => 'empty_id']));
        }
        
        if($mem->id_exists($id)){
            die(json_encode(['result' => 'fail']));
        } else {
            die(json_encode(['result' => 'success']));
        }

        // 이메일 중복확인
    } else if($mode == 'email_chk'){

        if($email == ''){
            die(json_encode(['result' => 'empty_email']));
        }

        // 이메일 형식체크
        if($mem->email_format_check($email) === false){
            die(json_encode(['result' => 'email_format_wrong']));
        }

        if($mem->email_exists($email)){
            die(json_encode(['result' => 'fail']));
        } else {
            die(json_encode(['result' => 'success']));
        }
    } else if($mode == 'input'){
        //Profile Image 처리
        $temparr = explode('.', $_FILES['photo']['name']); // ['sazin', 'jpg'] // 여기서 end()추가로 'jpg'라는 문자열이 배열안에 들어간다.
        $ext =  end($temparr);
        $photo = $id . '.'. $ext;

        copy($_FILES['photo']['tmp_name'], "../data/profile/".$photo);
        
        $arr = [
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'zipcode' => $zipcode,
            'addr1' => $addr1,
            'addr2' => $addr2,
            'photo' => $photo,
        ];

        $mem->input($arr);

        echo "
        <script>
            self.location.href='../member_success.php'
        </script>
        ";
    }else if($mode == 'edit'){
        //Profile Image 처리
        $old_photo = (isset($_POST["old_photo"]) && $_POST['old_photo'] != "") ? $_POST['old_photo'] : "";

        if(isset($_FILES['photo']) && $_FILES['photo']['name'] != ''){
            
            if($old_photo != ""){
                unlink("../data/profile/". $old_photo);
            }
            // exit;
            $temparr = explode('.', $_FILES['photo']['name']); // ['sazin', 'jpg'] // 여기서 end()추가로 'jpg'라는 문자열이 배열안에 들어간다.
            $ext =  end($temparr);
            $photo = $id . '.'. $ext;
    
            copy($_FILES['photo']['tmp_name'], "../data/profile/".$photo);

            $old_photo = $photo;   
        }
        
        $arr = [
            'idx' => $idx,
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'zipcode' => $zipcode,
            'addr1' => $addr1,
            'addr2' => $addr2,
            'photo' => $old_photo,
        ];

        $mem->edit($arr);

        echo "
        <script>
            self.location.href='../index.php'
        </script>
        ";

    }else if($mode == 'delete'){
        
        $arr = [
            'idx' => $idx,
        ];

        $mem->edit($arr);

        echo "
        <script>
            self.location.href='../index.php'
        </script>
        ";

    }

