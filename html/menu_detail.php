<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Detail</title>
    <link rel="stylesheet" href="../css/menu_detail.css?after">
</head>
<body>
<?php include("header.php"); ?>
<div class="big-box">
<?php
if (isset($_GET['menu_name'])) {
    $menu_name = $_GET['menu_name'];

    // Connect to the database
    $host = "localhost:3306";
    $username = "root";
    $password = "sieun119!";
    $database = "company_cafe";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch menu details from the database based on menu_name
    $query = "SELECT * FROM menu WHERE menu_name = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $menu_name);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $menu_name = $row["menu_name"];
            $picture = $row["picture"];
            $menu_price = $row["price"];
            $detail = $row["detail"];
            $tag = $row["tag"];

            // Display menu details
            echo "<div class='small-box'>";
            echo "<div class='menu_name'>";
            echo "<h1>$tag</h1>";
            echo "</div>";
            echo "<div class='menu-detail-box'>";
            echo "<div class='menu_img'>";
            echo "<img src='$picture' alt='$menu_name'>";
            echo "</div>";
            echo "<div class='menu_detail'>";
            echo "<h1>$menu_name</h1>";
            echo "<hr>";
            echo "<p>$detail</p>";
            echo "<hr id='hr'>";
            echo "<p id='price'>가격: $menu_price</p>";
            echo "<div class='submit'>";
            echo "<a href='main.php'>돌아가기</a>";
            echo "<form action='order.php' method='post'>";
            echo "<input type='hidden' name='menu_name' value='$menu_name'>";
            echo "<label for='quantity'>수량:</label>";
            echo "<select name='quantity' id='quantity'>";
            for ($quantity = 1; $quantity <= 5; $quantity++) {
                echo "<option value='$quantity'>$quantity</option>";
            }
            echo "</select>";
            echo "<input type='submit' value='담기'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            // Add to cart button
            
        } else {
            echo "<p>메뉴를 찾을 수 없습니다.</p>";
        }

        $stmt->close();
    } else {
        echo "Error in preparing the SQL statement.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "<p>메뉴를 선택해주세요.</p>";
}
?>
</body>
</html>
