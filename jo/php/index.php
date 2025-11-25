
<?php
// MariaDB 접속 설정
$db_host = 'mariadb-service'; // 같은 네임스페이스의 서비스 이름
$db_port = '3306';
$db_user = 'root'; // ⚠️ 위 MariaDB 파일과 일치해야 함
$db_pass = 'as1230'; // ⚠️ 위 MariaDB 파일과 일치해야 함
$db_name = 'mywebdb'; // ⚠️ 위 MariaDB 파일과 일치해야 함

echo "<h1>Kubernetes PHP Web App Status Check</h1>";
echo "<p>PHP Version: " . phpversion() . "</p>";

// MariaDB 연결 시도
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    echo "<h2>❌ DB 연결 실패:</h2>";
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<h2>✅ DB 연결 성공!</h2>";
}

$conn->close();
?>