<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit_profile.css?after">
    <title>Edit Profile</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php
    session_start();
    $db = mysqli_connect("localhost:3306","root","sieun119!","company_cafe");

    if(!$db)
    {
        echo "DB접속실패";
    }

    function mq($sql)
        {
            global $db;
            return $db->query($sql);
        }

    // Check if the user is logged in
    if (!isset($_SESSION['e_id'])) {
        header("location: login.php");
        exit();
    }

    // Retrieve user information based on the session id
    $e_id = $_SESSION['e_id'];
    $query = "SELECT * FROM EMPLOYEE WHERE e_id = '$e_id'";
    $result = mq($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $e_name = $row['e_name'];
        $title = $row['title'];
        $phone_number = $row['phone_number'];
        $password = $row['password'];
        // You may choose not to display the password in the form
    }
    ?>
    <div class="edit_bigbox">
        <div class="edit_box">
            <h2>Edit Profile</h2>
            <form method="post" action="edit_profile_complete.php">
                <!-- Display current information -->
                <label for="e_id">Employee ID:</label>
                <input type="text" name="e_id" value="<?php echo $e_id; ?>" readonly><br>

                <label for="e_name">Employee Name:</label>
                <input type="text" name="e_name" value="<?php echo $e_name; ?>" readonly><br>

                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $title; ?>" readonly><br>

                <!-- Allow password and phone number update -->
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" placeholder="Enter new password" value="<?php echo $password; ?>"><br>

                <label for="new_phone_number" >New Phone Number:</label>
                <input type="text" name="new_phone_number"  placeholder="<?php echo $phone_number; ?>" value="<?php echo $phone_number; ?>"><br>
                <div class="btn">
                    <button class="edit_profile_complete" type="submit">수정하기</button>
                    <button><a href="my_page2.php">돌아가기</a></button>
                </div> 
            </form>
        </div>
    </div>
    <!-- Include your footer or additional content here -->
</body>
</html>
