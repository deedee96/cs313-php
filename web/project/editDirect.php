<?php
session_start();
$username = $_SESSION['username'];
require('fetch.php');
$db = get_db();

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

    $query = "UPDATE contact_information SET address_1=:address, address_2=:address2, state=:state, zip=:zip,first_name=:first_name, last_name=:last_name, phone=:phone, email=:email WHERE user_name=:user_name";
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

$page = "info.php";
header("Location: $page");
die();


?>
