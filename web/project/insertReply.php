<?php
session_start();
require('fetch.php');
$content = $_POST['content'];
$username = $_SESSION['username'];
$thread_id = $_POST['thread_id'];



$db = get_db();
    

$stmt = $db->prepare('INSERT INTO reply (thread_id, content, date, username) values (:thread_id, :content , CURRENT_DATE, :username)');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue('thread_id', $thread_id, PDO::PARAM_INT);  
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();   

$page = "reply.php?thread_id=" .$thread_id;
header("Location: $page");
die();

?>