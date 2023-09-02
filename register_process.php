<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    if ($password != $confirm_password) {
        echo 'Passwords do not match';
    } else {
        //hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password_hash = password_hash($confirm_password, PASSWORD_DEFAULT);

        $db_host = 'localhost';
        $db_username = 'tega';
        $db_password = '123456';
        $db_name = 'tega';

        $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            die('Connection failed:' . $conn->error);
        }
        $check_sql = "SELECT id FROM registed_users WHERE username = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param('s', $username);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo 'Username already exists.';
        } else {
            $stmt = $conn->prepare("INSERT INTO registed_users(username, password, confirm_password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $password_hash, $confirm_password_hash);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            echo 'Resgistration Successful!';
        }
    }
}
