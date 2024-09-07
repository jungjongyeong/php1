<?php
// Member Class file

// session_start();

class Board {
    //맴버 변수
    private $conn;

    //생성자
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    //게시판 목록
    public function board_list($page, $limit, $paramArr){
        $start = ($page - 1) * $limit;

        $where = "";

        if($paramArr['sn'] != '' && $paramArr['sf'] != ''){
            switch($paramArr['sn']){
                case 1 : $sn_str = 'name'; break;
            }

            $where = " WHERE ".$sn_str."=:sf ";
        }

        $sql = "SELECT idx, btype, name, DATE_FORMAT(create_at,'%Y-%m-%d %H:%i') AS create_at 
        FROM board_manage ". $where ."
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

    //게시판 total
    public function board_total(){
        $sql = "SELECT COUNT(*) cnt FROM board_manage";
        $stmt = $this->conn->prepare($sql);
        $stmt ->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row["cnt"];
    }

    // 게시판 생성
    public function board_input($arr) {
        $sql = "INSERT INTO board_manage(name, btype, content, create_at) VALUES (:name, :btype, :content, NOW())";
        $stmt = $this->conn->prepare($sql);                
        $stmt->bindParam(':name', $arr["name"]);
        $stmt->bindParam(':btype', $arr["btype"]);
        $stmt->bindParam(':content', $arr["content"]);
        
        
        print_r($arr);
        $stmt->execute(); // 바인딩된 쿼리 실행 
    }
}