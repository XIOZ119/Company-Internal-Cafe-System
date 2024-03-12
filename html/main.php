<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Internal Cafe System</title>
    <link rel="stylesheet" href="../css/main.css?after">
    <script src="https://kit.fontawesome.com/7667d4618a.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="header2">
        <div class="menu">
            <div class="beverage">
                <a href="main.php">
                    <span>Bevarage</span>
                </a>
            </div>
            <div class="food">
                <a href="main_food.php" style="background-color: #57353282;">
                    <span>Food</span>
                </a>
            </div>
        </div>
        <div class="my-page">
            <a href="my_page2.php">
                <i class="fas fa-solid fa-user"></i>
                <span> MY PAGE</span>
            </a>

        </div>
    </div>
    <div class="main">
        <div class="menu-list">
            <?php
            include_once 'dbconfig.php';

            $dbname = "company_cafe";
            mysqli_select_db($conn, $dbname) or die('DB selection failed');
                
            // 메뉴 정보 가져오기
            $sql = "SELECT * FROM menu WHERE tag='bevarage'"; // 실제 테이블 이름으로 변경
            $result = $conn->query($sql);

             // 카운터 초기화
             $count = 0;

             if ($result->num_rows > 0) {
                 echo "<div class='menu-row'>"; // 새로운 행 시작
                 while ($row = $result->fetch_assoc()) {
                     echo "<div class='menu-list-box'>";
                     $menu_name = $row["menu_name"];
                     echo "<a href='menu_detail.php?menu_name=$menu_name'>";
                     echo "<div class='menu-img'>";
                     $imagePath = $row["picture"];
                     echo "<img src='$imagePath' alt='Image'>";
                     echo "</div>";
                     echo "<div class='menu-price'>";
                     echo "<span id='name'>" . $row["menu_name"] . "</span>";
                     echo "<span id='price'>" . $row["price"] . "</span>";
                     echo "</div>";
                     echo "</a>";
                     echo "</div>";
             
                     $count++; // 카운터 증가
             
                     // 4개의 열을 출력하면 새로운 행 시작
                     if ($count % 5 == 0) {
                         echo "</div><div class='menu-row'>";
                     }
                 }
                 echo "</div>"; // 마지막 행 닫기
             } else {
                 echo "메뉴가 없습니다.";
            }
            ?>
        </div>
        <div class="order-list">
            <span>product order list</span>
            <div class="order-detail">
                <?php
                $query = "SELECT menu_name, quantity, price * quantity AS price
                        FROM cart 
                        GROUP BY menu_name";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // 장바구니에 아이템이 있는 경우 테이블로 표시
                    echo "<table border='1'>";
                    echo "<tr><th>메뉴</th><th>수량</th><th>금액</th></tr>";
                    
                    while ($row = $result->fetch_assoc()) {
                        $menu_name = $row["menu_name"];
                        $quantity = $row["quantity"];
                        $price = $row["price"];
                        
                        echo "<tr>";
                        echo "<td>$menu_name</td>";
                        echo "<td>$quantity</td>";
                        echo "<td>$price</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    
                    // 장바구니가 비어있는 경우 메시지 표시
                    echo "<p>장바구니가 비어 있습니다.</p>";
                }
                ?>
            </div>
            
            <div class="delete_all" >
                <form action="delete_all_menus.php" method="post">
                    <button type="submit">전체 메뉴 삭제</button>
                </form>
            </div>
            
            <?php
            $query = "SELECT SUM(price * quantity) AS total_price
                    FROM cart";

            $result = $conn->query($query);
            
            if ($result->num_rows > 0 ) {
                $row = $result->fetch_assoc();
                $total_price = $row["total_price"];
                if($total_price === NULL) {
                    $total_price = 0;
                }
                echo "<div class='total_price'>$total_price 원</div>";   
            }
            $conn->close();
            ?>

            
            <div class="place-order"> 
                <form action="order_complete.php" method="post">
                    <button class="order_complete" type="submit">주문하기</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>