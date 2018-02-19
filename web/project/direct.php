<?php
    require('fetch.php');
    session_start();

    $db = get_db();
    
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $db->prepare('SELECT * FROM user_log WHERE user_name=:username AND password=:password');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();   
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($rows) == 0) {
        $_SESSION['message'] = "Username or password doesn't match with our file";
        header('Location: login.php');
        exit;
    }

    else {
        unset($_SESSION['message']);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $username;

        header('Location: about.php');
        die();
    }

?>
