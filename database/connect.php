<?php

    try {
        $dsn = 'pgsql:host=localhost;dbname=auth_php';
        $pdo = new PDO($dsn, "aramkhachatryan", "22arkh06");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed" . $e->getMessage();
    }
