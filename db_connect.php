<?php
$host = "sql311.infinityfree.com";
$user = "if0_39128377";
$password = "Rpaqpf1225";
$dbname = "if0_39128377_user_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}
?>
