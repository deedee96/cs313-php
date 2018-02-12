<?php
  
    try
    {
      $user = 'postgres';
      $password = 'password';
      $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $user, $password);
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $db->prepare('SELECT * FROM user_log WHERE user_name=:username AND password=:password');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();   
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($rows) == 0) {
        header('Location: login.php');
        exit;
    }

    else {
        header('Location: index.php');
        exit;
    }


?>