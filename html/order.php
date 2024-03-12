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

// 메뉴가 전달되었는지 확인
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['menu_name'])) {
    $menu_name = $_POST['menu_name'];
    $quantity = $_POST['quantity'];

    // 주문을 데이터베이스에 추가
    $query = "SELECT menu_id, menu_name, price FROM menu WHERE menu_name = '$menu_name'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // 체크 아이템이 이미 카트에 있는지 확인
        $check_query = "SELECT menu_id, quantity FROM cart WHERE menu_name = '$menu_name'";
        $check_result = $conn->query($check_query);

        // 카트 테이블에 주문 추가
        if ($check_result->num_rows > 0) {
            // 이미 주문한 메뉴가 있으면 수량 증가
            $row = $check_result->fetch_assoc(); // Change $result to $check_result
            $menu_id = $row["menu_id"];
            $existing_quantity = $row["quantity"];

            $update_quantity = $existing_quantity + $quantity;

            $update_query = "UPDATE cart SET quantity = $update_quantity WHERE menu_id = $menu_id";

        if ($conn->query($update_query) === TRUE) {
            echo "<script>alert('수량이 증가되었습니다.');</script>";
            } else {    
                    echo "Error updating record: " . $conn->error;
                }
        } else {
            // 새로운 주문이면 카트에 추가
            $row = $result->fetch_assoc();
            $menu_id = $row["menu_id"];
            $menu_name = $row["menu_name"];
            $price = $row["price"];

            $insert_query = "INSERT INTO cart (menu_id, menu_name, price, quantity) VALUES (
                $menu_id, '$menu_name', '$price', $quantity
            )";

            if ($conn->query($insert_query) === TRUE) {
                echo "<script>alert('새로운 메뉴가 추가되었습니다.');</script>";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
    } else {
        echo "해당하는 메뉴가 없습니다.";
    }
}

$conn->close();
?>

<script>
    window.location.href = "main.php";
</script>