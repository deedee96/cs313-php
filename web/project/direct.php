<?php

    // default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
     // example localhost configuration URL with postgres username and a database called cs313db
     $dbUrl = "postgres://postgres:password@localhost:5432/postgres";
    }

    $dbopts = parse_url($dbUrl);


    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');


    try {
     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
     print "<p>error: $ex->getMessage() </p>\n\n";
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
