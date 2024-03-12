<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* 추가된 스타일 */
        body {
            font-family: 'Noto Sans KR', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f5f2; /* 연한 베이지색 배경 */
        }

        .cafe-header {
            background-color: #6b4226; /* 갈색 헤더 배경색 */
            color: white;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            position: relative; /* 상대 위치 설정 */
        }

        h1,
        h2 {
            margin: 0;
        }

        span {
            font-size: 0.7em;
            display: block;
            margin-top: 10px;
        }

        #search-bar {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
            margin-top: 10px;
        }

        #search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        #search-button {
            background-color: #6b4226;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }


        #user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            flex-direction: column;
        }

        #profile-picture {
            width: 200px;
            height: 200px;
            background-color: #d1ccc0; /* 연한 회색 배경 */
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #6b4226; /* 갈색 테두리 */
            overflow: hidden; /* 이미지가 테두리를 넘어가지 않도록 함 */
        }

        #profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* 이미지가 영역에 맞게 조절됨 */
        }

        #user-details {
            text-align: center;
            margin-top: 20px;
        }

        #user-details p {
            margin: 5px 0;
        }

        .user-activities-container {
            margin: 20px 0;
        }

        .user-activities-icon {
            display: flex;
            justify-content: space-between;
        }

        .activity-icon {
            width: 80px; /* Increase the width */
            height: 80px; /* Increase the height */
            background-color: #8b5d2e; /* Adjusted brown background color */
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            cursor: pointer;
            color: white; /* Text color set to white */
        }

        .activity-icon i {
            font-size: 24px;
        }

        /* Additional styles for the text next to the icons */
        .activity-icon span {
            font-size: 0.8em;
            margin-top: 5px; /* Adjusted margin for better spacing */
            text-align: center;
            display: block;
        }


        #mileage-history,
        #order-history {
            display: none; /* 초기에는 숨김 상태로 설정 */
        }

        .cafe-footer {
            background-color: #6b4226;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #order-button {
            background-color: #6b4226;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
    <title>Company Internal Cafe System 🌿</title>
</head>

<body>
    <header class="cafe-header">
        <h1>Company Internal Cafe System 🌿</h1>
    </header>
    <div id="search-bar">
        <input type="text" id="search-input" placeholder="검색...">
        <button id="search-button"><i class="fas fa-search"></i></button>
    </div>
    <i id="my-page-icon" class="fas fa-user"></i>
    <span id="my-page-text">My Page</span>
    <section id="user-info">
        <div id="profile-picture">
            <img src="C:\Users\ellas\OneDrive\바탕 화면\3135707.png" alt="프로필 이미지">
        </div>
        <div id="user-details">
            <h2 id="username">Jone Doe</h2>
            <p id="employee-id">1111</p>
            <p id="phone-number">010-1234-5678</p>
            <p id="email">john.doe@example.com</p>
            <p id="address">서울시 강남구 강남대로 1234</p>
            <p id="position">소프트웨어 개발자</p>
        </div>
        <div id="user-links">
            <button id="order-button" onclick="goToOrder()"><i class="fas fa-shopping-cart"></i> 주문하러 가기</button>
        </div>
        <div class="user-activities-container">
            <h3>최근 활동</h3>
            <div class="user-activities-icon">
                <div class="activity-icon" onclick="toggleSection('mileage-history')">
                    <i class="fas fa-coins"></i>
                    <span>Mileage History</span>
                </div>
                <div class="activity-icon" onclick="toggleSection('order-history')">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Order History</span>
                </div>
                <!-- Additional icons and text can be added here -->
            </div>
        </div>
    </section>
    <section id="mileage-history" class="hidden-section">
        <h3>마일리지 내역 조회</h3>
        <!-- ... 추가적인
<!-- ... 이전 섹션 코드 ... -->
<section id="mileage-history" class="hidden-section">
    <h3>마일리지 내역 조회</h3>
    <!-- 추가적인 마일리지 내역 조회 섹션의 내용을 여기에 추가하세요 -->
    <?php
    // PHP 코드를 사용하여 마일리지 내역을 동적으로 생성하거나 데이터베이스에서 가져올 수 있습니다.
    // 예시: 마일리지 내역을 반복문으로 표시
    $mileageHistory = array(
        array('date' => '2023-01-01', 'amount' => 100),
        array('date' => '2023-02-01', 'amount' => 150),
        array('date' => '2023-03-01', 'amount' => 200),
    );

    foreach ($mileageHistory as $history) {
        echo '<p>Date: ' . $history['date'] . ' - Amount: ' . $history['amount'] . '</p>';
    }
    ?>
</section>

<section id="order-history" class="hidden-section">
    <h3>주문 내역</h3>
    <!-- 추가적인 주문 내역 섹션의 내용을 여기에 추가하세요 -->
    <?php
    // PHP 코드를 사용하여 주문 내역을 동적으로 생성하거나 데이터베이스에서 가져올 수 있습니다.
    // 예시: 주문 내역을 반복문으로 표시
    $orderHistory = array(
        array('date' => '2023-01-01', 'item' => 'Coffee', 'amount' => 2),
        array('date' => '2023-02-01', 'item' => 'Tea', 'amount' => 1),
        array('date' => '2023-03-01', 'item' => 'Sandwich', 'amount' => 3),
    );

    foreach ($orderHistory as $order) {
        echo '<p>Date: ' . $order['date'] . ' - Item: ' . $order['item'] . ' - Amount: ' . $order['amount'] . '</p>';
    }
    ?>
</section>
<!-- ... 이전 섹션 코드 ... -->

<footer class="cafe-footer">
    <!-- © 2023 Cafe Order System. All rights reserved. -->
</footer>
<script src="script.js"></script>
<script>
    // 특정 섹션을 토글하는 함수
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.classList.toggle("hidden-section");
    }

    // 주문 페이지로 이동하는 함수
    function goToOrder() {
        // 여기에 주문 페이지로 이동하는 로직 추가
        alert('주문 페이지로 이동합니다.');
    }
</script>

</body>

</html>