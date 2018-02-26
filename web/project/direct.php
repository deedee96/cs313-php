<?php
    require('fetch.php');
    session_start();

    $db = get_db();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $db->prepare('SELECT * FROM user_log WHERE user_name=:username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();   
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (password_verify($password, $row['password'])) {
    // Correct Password
        unset($_SESSION['message']);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        //var_dump($password);

        header('Location: about.php');
        die();
    } else {
        $_SESSION['message'] = "Username or password doesn't match with our file";
        #var_dump($password);

        header('Location: login.php');
        exit;
    }

?>
