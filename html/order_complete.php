<?php
// 데이터베이스 연결 설정
$host = "localhost";
$username = "root";
$password = "sieun119!";
$database = "company_cafe";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 현재 시간
$order_time = date("Y-m-d H:i:s") . substr((string)microtime(), 1, 4);

// 장바구니에 있는 주문 정보 가져오기
$query = "SELECT menu_name, quantity, price, price * quantity AS total_price
        FROM cart";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // 주문 정보를 order 테이블에 추가
    while ($row = $result->fetch_assoc()) {
        $menu_name = $row["menu_name"];
        $quantity = $row["quantity"];
        $price = $row["price"];
        $total_price = $row["total_price"];

        $insert_query = "INSERT INTO `order_detail` (menu_name, quantity, total_price, order_time, price) 
                 VALUES ('$menu_name', '$quantity', '$total_price', NOW(), '$price')";

        if ($conn->query($insert_query) !== TRUE) {
            echo "Error inserting record: " . $conn->error;
        }
    }

    // 장바구니 비우기
    $delete_query = "DELETE FROM cart";
    if ($conn->query($delete_query) !== TRUE) {
        echo "Error deleting record: " . $conn->error;
    }
    echo "<script>alert('주문이 성공적으로 완료되었습니다.');</script>";
} else {
    echo "<script>alert('장바구니가 비어있습니다.');</script>";
}

$conn->close();
?>


<script>
    window.location.href = "main.php";
</script>