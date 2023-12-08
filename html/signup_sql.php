<?php
include_once 'dbconfig.php';

if (isset($_POST['e_id']) && isset($_POST['e_name']) && isset($_POST['title']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['phone_number'])) {
    $user_id = mysqli_real_escape_string($db, $_POST['e_id']);
    $user_nickname = mysqli_real_escape_string($db, $_POST['e_name']);
    $user_title = mysqli_real_escape_string($db, $_POST['title']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['password1']);
    $user_pass2 = mysqli_real_escape_string($db, $_POST['password2']);
    $user_tel = mysqli_real_escape_string($db, $_POST['phone_number']);

    // Error checks
    if (empty($user_id) || empty($user_nickname) || empty($user_title) || empty($user_pass1) || empty($user_pass2) || empty($user_tel)) {
        echo "<script>
        alert('Please fill in all the fields.');
        location.replace('./register_view.php');
        </script>";
        exit();
    } elseif ($user_pass1 !== $user_pass2) {
        echo "<script>
        alert('Passwords do not match.');
        location.replace('./register_view.php');
        </script>";
        exit();
    }

    // Check for duplicate ID or nickname
    $stmt_same = $db->prepare("SELECT * FROM employee WHERE e_id = ? OR e_name = ?");
    $stmt_same->bind_param("ss", $user_id, $user_nickname);
    $stmt_same->execute();
    $result_same = $stmt_same->get_result();

    if ($result_same->num_rows > 0) {
        echo "<script>
        alert('ID or nickname already exists.');
        location.replace('./register_view.php');
        </script>";
        exit();
    } else {
        $stmt_save = $db->prepare("INSERT INTO employee (e_id, e_name, title, Password, phone_number) VALUES (?, ?, ?, ?, ?)");
        $stmt_save->bind_param("sssss", $user_id, $user_nickname, $user_title, $user_pass1, $user_tel);

        if ($stmt_save->execute()) {
            echo "<script>
            alert('Registration successful. Please log in.');
            location.replace('./login.php');
            </script>";
        } else {
            echo "<script>
            alert('Registration failed.');
            location.replace('./register_view.php');
            </script>";
        }

        $stmt_save->close();
    }
    $stmt_same->close();
} else {
    echo "<script>
    alert('An unknown error occurred.');
    location.replace('./register_view.php');
    </script>";
}
?>
