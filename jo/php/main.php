<?php
// 1. 세션 시작 및 로그인 확인
session_start();

// 로그인하지 않았다면 로그인 페이지로 리다이렉트 (보안)
if (!isset($_SESSION['userid'])) {
    header("Location: ../login");
    exit;
}

$logged_in_userid = $_SESSION['userid'];

// 2. DB 연결 설정
$db_host = 'mariadb-service'; 
$db_port = '3306';
$db_user = 'root';
$db_pass = 'as1230';
$db_name = 'mywebdb'; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 3. 사용자 정보 SELECT 쿼리 실행
// 비밀번호 필드는 SELECT 하지 않습니다.
$sql = "SELECT name, email FROM users WHERE userid = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("SQL 쿼리 준비 실패: " . $conn->error);
}

$stmt->bind_param("i", $logged_in_userid);
$stmt->execute();
$result = $stmt->get_result();

$user_info = null;
if ($result->num_rows === 1) {
    $user_info = $result->fetch_assoc();
} else {
    session_destroy();
    die("사용자 정보를 찾을 수 없습니다.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <title>CoConut 내 정보</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f7f6; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
        }
        .profile-card { 
            background-color: #ffffff; 
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
            width: 100%; 
            max-width: 350px; 
            text-align: center;
        }
        h1 { color: #333; margin-bottom: 30px; }
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #555;
            text-align: left;
            flex-basis: 30%;
        }
        .value {
            color: #333;
            text-align: right;
            flex-basis: 70%;
            word-break: break-all; /* 긴 이메일 주소 처리 */
        }
        .link-group { 
            margin-top: 30px;
        }
        .link-group a {
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        .logout-btn {
            background-color: #dc3545; /* 빨간색 */
            color: white;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .edit-btn {
            background-color: #007bff; /* 파란색 */
            color: white;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <h1>내 정보</h1>
        
        <div class="info-item">
            <span class="label">이름</span>
            <span class="value"><?php echo htmlspecialchars($user_info['name']); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">이메일</span>
            <span class="value"><?php echo htmlspecialchars($user_info['email']); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">비밀번호</span>
            <span class="value">********</span> 
        </div>
        
        <div class="link-group">
            <a href="./edit_form.php" class="edit-btn">정보 수정</a>
            <a href="../logout.php" class="logout-btn">로그아웃</a>
        </div>
    </div>
</body>
</html>