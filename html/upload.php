<?php
$servername = "localhost:3306";
$username = "root";
$password = "sieun119!";
$database = "company_cafe";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/"; // 이미지를 업로드할 디렉토리
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    // 이미지를 서버에 업로드
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $targetFile;

        // 데이터베이스에 이미지 경로 저장
        $sql = "UPDATE menu SET picture = '$imagePath' WHERE menu_id = 8003";

        if ($conn->query($sql) === TRUE) {
            echo "이미지가 성공적으로 업로드되었습니다.";
        } else {
            echo "이미지 경로를 데이터베이스에 저장하는 중 오류가 발생했습니다: " . $conn->error;
        }
    } else {
        echo "이미지 업로드 실패.";
    }
}

$conn->close();
?>