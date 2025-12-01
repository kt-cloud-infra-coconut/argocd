<?php 
// 1. 요청이 POST 방식인지 확인합니다. (회원가입 버튼을 눌렀을 때만 실행)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // DB 접속 정보 (이 부분은 변경하지 않습니다)
    $db_host = 'mariadb-service'; 
    $db_port = '3306';
    $db_user = 'root';
    $db_pass = 'as1230';
    $db_name = 'mywebdb'; 

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

    if ($conn->connect_error) {
        echo "<script>alert('데이터베이스 연결 실패: " . $conn->connect_error . "'); history.back();</script>";
        exit;
    }

    // ... (이하 DB 처리 및 입력값 체크 로직 유지) ...
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!$name || !$password || !$email) {
        echo "<script>alert('모든 정보를 입력하세요.'); history.back();</script>";
        exit;
    }

    // 1. SQL 쿼리 준비
    $sql = "INSERT INTO users (name, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // 2. 값 바인딩 (s = string, 문자열 3개)
    // ⭐⭐⭐ 쿼리 실행의 핵심 수정 부분 ⭐⭐⭐
    if ($stmt === false) {
        echo "<script>alert('SQL 쿼리 준비 실패: " . $conn->error . "'); history.back();</script>";
        exit;
    }
    
    $stmt->bind_param("sss", $name, $password, $email);

    // 3. 쿼리 실행
    if($stmt->execute()) {
        echo "<script>alert('회원가입이 완료되었습니다.'); location.href='http://34.64.56.21:30085/';</script>";
    } else {
        // 오류 상세 정보 포함
        echo "<script>alert('회원가입에 실패했습니다. 다시 시도해주세요. 오류: " . $stmt->error . "'); history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();

}
// POST 요청이 아니면 아무것도 출력하지 않음
?>