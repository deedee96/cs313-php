<?php
session_start();
require('fetch.php');
$title = $_POST['title'];
$content = $_POST['content'];
$username = $_SESSION['username'];
$country_name = $_POST['country_name'];

$db = get_db();
    

$stmt = $db->prepare('INSERT INTO thread (discussion_country,title,content, date, username) values (:country, :title, :content , CURRENT_DATE, :username)');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue('country', $country_name, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();   

$page = "forum.php?country_name=" .$country_name;
header("Location: $page");
die();
?>