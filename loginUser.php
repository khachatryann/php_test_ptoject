<?php
    session_start();
    require_once 'database/connect.php';

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $findUser = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $findUser->execute([$email]);
        $result = $findUser->fetch(PDO::FETCH_ASSOC);

        unset($_SESSION['permission_denied']);

        if(password_verify($password, $result['password']) && $result) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['auth_username'] = $result['username'];

            (!empty($_POST['remember_me']) ? setcookie("email", $_POST['email'], time() + 3600) : setcookie("email", ""));

            header('Location: /resources/views/home.php');
            unset($_SESSION['wrong_data']);
            exit;
        } else {
            $_SESSION['wrong_data'] = "Wrong Email or Password";
            header('Location: /resources/views/login.php');
        }
    }
