<?php
if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['submit'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $db_host = 'localhost';
    $db_username = 'tega';
    $db_pass = '123456';
    $db_name = 'tega';

    $conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

    if($conn->connect_error){
        die('Connection error:' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("SELECT password FROM registed_users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($stored_password);
        $stmt->fetch();
        $stmt->close();

        //verify password
        if($stored_password && password_verify($password, $stored_password)){
            echo 'Login successful';
        }else{
            echo 'Invalid Credentials';
        }
    }
}

?>
