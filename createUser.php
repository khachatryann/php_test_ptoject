<?php
    session_start();
    require_once './database/connect.php';

    if (isset($_POST['create-user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $password_confirm = $_POST['password_confirm'];
        $password_length = strlen($password);

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $emailCount = $stmt->fetchColumn();

        if ($username != '' && $email != '' && $password != '' && $password_length >= 6 && $password === $password_confirm && $emailCount == 0) {
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $query = $pdo->prepare($sql);
            $query->execute([$username, $email, $password_hash]);

            header('Location: resources/views/login.php');
            unset(
                $_SESSION['username_err'],
                $_SESSION['email_err'],
                $_SESSION['email_unique_err'],
                $_SESSION['pswd_err'],
                $_SESSION['pswd_length_err'],
                $_SESSION['pswd_confirm_err'],
                $_SESSION['correct_username'],
                $_SESSION['correct_email']
            );
            exit();
        } else {
            header('Location: /');

            $_SESSION['correct_username'] = ($username != '') ? $username : '';
            $_SESSION['correct_email'] = ($email != '' && $emailCount == 0) ? $email : '';

            $errors = [
                'username' => 'Username field is required.',
                'email' => 'Email field is required.',
                'email_unique' => 'Email already registered',
                'password' => 'Password field is required.',
                'password_length' => 'Minimum length of characters is 6.',
                'password_confirm' => 'Password confirmation doesnt match.'
            ];

            $_SESSION['username_err'] = ($username == '') ? $errors['username'] : '';
            $_SESSION['email_err'] = ($email == '') ? $errors['email'] : '';
            $_SESSION['email_unique_err'] = ($emailCount > 0) ? $errors['email_unique'] : '';
            $_SESSION['pswd_err'] = ($password == '') ? $errors['password'] : '';
            $_SESSION['pswd_length_err'] = ($password_length >=1 && $password_length < 6) ? $errors['password_length'] : '';
            $_SESSION['pswd_confirm_err'] = ($password !== $password_confirm) ? $errors['password_confirm'] : '';
        }
    }


