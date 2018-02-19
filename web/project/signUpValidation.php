<?php
session_start();
require('fetch.php');

$username = htmlspecialchars($_POST['username']);
$db = get_db();

$query = "SELECT * FROM user_log where user_name=:username";
$stmt = $db->prepare($query);
// Bind any parameters
$stmt->bindValue(":username", $username, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



if (sizeof($rows) != 0) {
    $_SESSION["message"] = "Username already exist. Please sign in";
}

else {
    $_SESSION["message"] = "You have sucessfully created an account. Please sign in.";

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $password = htmlspecialchars($_POST['password']);
    $address = htmlspecialchars($_POST['address1']);
    $address2 = htmlspecialchars($_POST['address2']);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
    $email = htmlspecialchars($_POST['email']);
    
    $query = "INSERT INTO user_log(user_name, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    // Bind any parameters
    $stmt->bindValue(":username", $username, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    try {
        // SB: This was silently failing on me a lot, so to help debug it, I put it inside a try catch block. It was generating an exception, and it helped me track down my problem.
        $stmt->execute();
    } catch (Exception $ex) {
        // If this were in production, you would not want to echo
        // the details of the exception.
        echo "Error connecting to DB. Details: $ex";
        var_dump($ex);
        die();
    } 
    
    $db = get_db();
    $query = "INSERT INTO contact_information(address_1, address_2, state, zip, first_name, last_name,phone,email,user_name) VALUES (:address, :address2, :state, :zip, :first_name, :last_name, :phone, :email, :user_name)";
    $stmt = $db->prepare($query);
    // Bind any parameters
    $stmt->bindValue(":address", $address, PDO::PARAM_STR);
    $stmt->bindValue(":address2", $address2, PDO::PARAM_STR);
    $stmt->bindValue(":state", $state, PDO::PARAM_STR);
    $stmt->bindValue(":zip", $zip, PDO::PARAM_STR);

    $stmt->bindValue(":first_name", $fname, PDO::PARAM_STR);
    $stmt->bindValue(":last_name", $lname, PDO::PARAM_STR);
    $stmt->bindValue(":phone", $phone, PDO::PARAM_STR);  
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);  
    $stmt->bindValue(":user_name", $username, PDO::PARAM_STR);  

    try {
        // SB: This was silently failing on me a lot, so to help debug it, I put it inside a try catch block. It was generating an exception, and it helped me track down my problem.
        $stmt->execute();
    } catch (Exception $ex) {
        // If this were in production, you would not want to echo
        // the details of the exception.
        echo "Error connecting to DB. Details: $ex";
        var_dump($ex);
        die();
    } 

    
    
}

$page = "login.php";
header("Location: $page");
die();



?>