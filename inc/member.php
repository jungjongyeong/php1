<?php
// Member Class file

// session_start();

class Member {
    //맴버 변수
    private $conn;

    //생성자
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    // 아이디 중복체크용 맴버 함수, 메서드
    public function id_exists($id) {
        $sql = "SELECT * FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql); // 해커들의 인잭션들로부터 보호
        $stmt->bindParam(':id', $id); // 쿼리를 바인딩
        $stmt->execute(); // 바인딩된 쿼리 실행

        return $stmt->rowCount() ? true : false; // 쿼리숫자가 1개라도 있으면 true 아니면 false
    }

    // 이메일 형식 체크  
    public function email_format_check($email){
       return filter_var($email, FILTER_VALIDATE_EMAIL); // FILTER_VALIDATE_IP // FILTER_VALIDATE_MAC //FILTER_VALIDATE_REGEXP //FILTER_VALIDATE_URL
    }

    
    
    // 이메일 중복체크용 맴버 함수, 메서드
    public function email_exists($email) {
        $sql = "SELECT * FROM member WHERE email=:email";
        $stmt = $this->conn->prepare($sql); // 해커들의 인잭션들로부터 보호 
        // 인잭션이란, 신뢰할 수 없는 입력을 프로그램에 주입하도록하는 공격을 의미하며 이를 통해 결과값을 다르게 나오도록 할 수 있다.
        // 인잭션 종류 1. SQL Injection 악의적인 SQL문을 실행되게 함으로써 데이터베이스를 비정상적으로 조작 공격 방법
        // 인잭션 종류 2. Code Injection 유효하지 않은 데이터를 실행
        $stmt->bindParam(':email', $email); // 쿼리를 바인딩
        $stmt->execute(); // 바인딩된 쿼리 실행 
        
        return $stmt->rowCount() ? true : false; // 쿼리숫자가 1개라도 있으면 true 아니면 false
    }
    
    // 회원정보 입력
    public function input($marr) {

        // 단방향 암호화
        $new_hash_password = password_hash($marr['password'], PASSWORD_DEFAULT); //PASSWORD_DEFAULT : bcrypt 알고리즘을 사용, 시간이 지남에 따라 변경되도록 설계되어있음

        $sql = "INSERT INTO member(id, name, password, email, zipcod, addr1, addr2, photo, create_at, ip) VALUES
                (:id, :name, :password, :email, :zipcod, :addr1, :addr2, :photo, NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);                
        $stmt->bindParam(':id', $marr["id"]);                
        $stmt->bindParam(':name', $marr["name"]);                
        $stmt->bindParam(':password', $new_hash_password);                
        $stmt->bindParam(':email', $marr["email"]);                
        $stmt->bindParam(':zipcod', $marr["zipcode"]);                
        $stmt->bindParam(':addr1', $marr["addr1"]);                
        $stmt->bindParam(':addr2', $marr["addr2"]);                
        $stmt->bindParam(':photo', $marr["photo"]);                
        $stmt->bindParam(':ip', $_SERVER["REMOTE_ADDR"]);
        
        print_r($marr);
        $stmt->execute(); // 바인딩된 쿼리 실행 
    }


    // 로그인
    public function login($id, $pw){

        $sql = "SELECT password FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);                
        $stmt->bindParam(':id', $id);
        $stmt->execute(); // 바인딩된 쿼리 실행 
        if($stmt->rowCount()){
            $row = $stmt->fetch();
            
            if(password_verify($pw, $row['password'])){ //password_verify() : password_hash()로 암호화한 비밀번호가 사용자가 입력한 값과 같은지 확인하는 함수
                $sql = "UPDATE member SET login_dt=NOW() WHERE id=:id";
                $stmt = $this->conn->prepare($sql);                
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return true;
            } else {
                return false;
            }

        }else{
            return false;
        }

    }
    
    // 로그아웃
    public function logout(){
        session_start();
        session_destroy();
        die('<script>self.location.href="../member/index.php"</script>');
    }

    // 회원 정보 가져오기
    public function getInfo($id){
        $sql = "SELECT * FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);                
        $stmt ->bindParam(":id", $id);
        $stmt ->setFetchMode(PDO::FETCH_ASSOC); // 데이터베이스에서 레코드(DB의 테이블에서 하나의 행)를 가져올 때 사용할 기본 페치 모드설정   // PDO::FETCH_ASSOC는 연관 배열 형태(키는 열 이름으로 됨)로 반환
        $stmt ->execute();
        return $stmt->fetch(); //데이터베이스의 행을 배열로 반환
    }

    // 회원 정보 변경
    public function edit($marr){
        $sql = "UPDATE member SET name=:name, email=:email, zipcod=:zipcod, addr1=:addr1, addr2=:addr2, photo=:photo";
        $params = [
            ':name' => $marr['name'],
            ':email' => $marr['email'],
            ':zipcod' => $marr['zipcode'],
            ':addr1' => $marr['addr1'],
            ':addr2' => $marr['addr2'],
            ':photo' => $marr['photo'],
            ':id' => $marr['id'],
        ];

        if($marr['password'] != ""){
            //단방향 암호화
            $new_hash_password = password_hash($marr['password'], PASSWORD_DEFAULT);
            $params[":password"] = $new_hash_password;

            $sql .= ", password=:password";
        }

        $sql .= " WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt ->execute($params);

    }

    //회원목록
    public function list($page, $limit, $paramArr){
        $start = ($page - 1) * $limit;

        $where = "";

        if($paramArr['sn'] != '' && $paramArr['sf'] != ''){
            switch($paramArr['sn']){
                case 1 : $sn_str = 'name'; break;
                case 2 : $sn_str = 'id'; break;
                case 3 : $sn_str = 'email'; break;
            }

            $where = " WHERE ".$sn_str."=:sf ";
        }

        $sql = "SELECT idx, id, name, email, DATE_FORMAT(create_at,'%Y-%m-%d %H:%i') AS create_at 
        FROM member ". $where ."
        ORDER BY idx DESC LIMIT ".$start.",". $limit; // 1페이지면 0부터, 5개 2페이지면 5부터 5개 page를 가져와야함
        $stmt = $this->conn->prepare($sql);

        if($where != ''){
            $stmt->bindParam(':sf', $paramArr["sf"]);
        }


        $stmt ->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        // echo $sql;
        return $stmt->fetchAll(); //여러개 출력하려면 fetchAll()

    }


    public function total(){
        $sql = "SELECT COUNT(*) cnt FROM member";
        $stmt = $this->conn->prepare($sql);
        $stmt ->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row["cnt"];
    }

}