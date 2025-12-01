<?php
// 세션 시작 (로그인 상태 유지를 위해 필수)
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // DB 접속 정보 (회원가입과 동일)
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

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$email || !$password) {
        echo "<script>alert('이메일과 비밀번호를 모두 입력하세요.'); history.back();</script>";
        exit;
    }
    
    // ⭐ Prepared Statement: email과 password가 일치하는 사용자를 찾습니다. ⭐
    $sql = "SELECT userid, name, email FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo "<script>alert('SQL 쿼리 준비 실패: " . $conn->error . "'); history.back();</script>";
        exit;
    }

    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // 로그인 성공! 세션 변수에 사용자 정보 저장
            $_SESSION['userid'] = $user['userid'];
            $_SESSION['username'] = $user['name'];
            
            echo "<script>alert('로그인 성공!'); location.href='http://34.64.56.21:30085/edit/';</script>"; // edit 페이지로 이동
        } else {
            // 사용자 정보 불일치
            echo "<script>alert('이메일 또는 비밀번호가 일치하지 않습니다.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('로그인 처리 중 오류가 발생했습니다: " . $stmt->error . "'); history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();

} else {
    header("Location: ./index.php");
    exit;
}
?>