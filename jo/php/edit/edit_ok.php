<?php
// 세션 시작 (로그인 상태 유지를 위해 필수)
session_start();

// 1. 로그인 여부 확인
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='http://34.64.56.21:30085/';</script>";
    exit;
}

// 2. DB 접속 정보
$db_host = 'mariadb-service'; 
$db_port = '3306';
$db_user = 'root';
$db_pass = 'as1230';
$db_name = 'mywebdb'; 

// 3. POST 요청 확인
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /edit"); // POST 요청이 아니면 수정 페이지로 리다이렉트
    exit;
}

// 4. 입력 데이터 정리 및 변수 할당
// 세션에서 현재 로그인된 사용자의 ID를 가져옴 (WHERE 조건으로 사용)
$user_id_to_update = $_SESSION['userid']; 

$new_name = $_POST['name'] ?? '';
$new_email = $_POST['email'] ?? '';
$new_password = $_POST['password'] ?? ''; // 비밀번호는 선택적일 수 있음

// 5. 유효성 검사
if (empty($new_name) || empty($new_email)) {
    echo "<script>alert('이름과 이메일은 필수 입력 사항입니다.'); history.back();</script>";
    exit;
}

// 6. DB 연결
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    echo "<script>alert('데이터베이스 연결 실패: " . $conn->connect_error . "'); history.back();</script>";
    exit;
}

// 7. 조건부 업데이트 쿼리 준비 (비밀번호 입력 여부에 따라 분기)
if (!empty($new_password)) {
    // 비밀번호가 입력된 경우: 이름, 이메일, 비밀번호 모두 업데이트
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo "<script>alert('SQL 쿼리 준비 실패 (비밀번호 포함): " . $conn->error . "'); history.back();</script>";
        $conn->close();
        exit;
    }
    
    // 바인딩: sssi (name, email, hashed_password, userid)
    $stmt->bind_param("sssi", $new_name, $new_email, $hashed_password, $user_id_to_update);
    
} else {
    // 비밀번호가 입력되지 않은 경우: 이름, 이메일만 업데이트
    $sql = "UPDATE users SET name = ?, email = ? WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo "<script>alert('SQL 쿼리 준비 실패 (비밀번호 제외): " . $conn->error . "'); history.back();</script>";
        $conn->close();
        exit;
    }
    
    // 바인딩: ssi (name, email, userid)
    $stmt->bind_param("ssi", $new_name, $new_email, $user_id_to_update);
}

// 8. 쿼리 실행
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        // 업데이트 성공 시 세션 정보 업데이트
        $_SESSION['username'] = $new_name; 
        // 이메일도 변경된 경우 세션에 반영할 수 있지만, 여기서는 사용자 이름만 반영합니다.
        
        echo "<script>alert('회원 정보 수정 성공!'); location.href='/edit';</script>"; 
    } 
} else {
    // 쿼리 실행 실패
    echo "<script>alert('정보 수정 중 오류가 발생했습니다: " . $stmt->error . "'); history.back();</script>";
}

// 9. 정리
$stmt->close();
$conn->close();
?>