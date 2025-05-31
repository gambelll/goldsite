<?php
header('Content-Type: application/json');

$host = "sql311.infinityfree.com";
$user = "if0_39128377";
$password = "Rpaqpf1225";
$dbname = "if0_39128377_user_db";

// MySQL 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['error' => 'DB 연결 실패']);
    exit;
}

if (!isset($_GET['userid'])) {
    echo json_encode(['error' => '아이디가 전달되지 않았습니다.']);
    exit;
}

$userid = $conn->real_escape_string($_GET['userid']);
$sql = "SELECT COUNT(*) AS cnt FROM user WHERE userid = '$userid'"; // users 테이블과 userid 컬럼명 확인
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['error' => '쿼리 실패']);
    exit;
}

$row = $result->fetch_assoc();

echo json_encode(['exists' => $row['cnt'] > 0]);

$conn->close();
?>
