<?php
session_start();
?>

Your order of $<?php echo htmlspecialchars($_POST["total"])?> has been shipped to <?php echo htmlspecialchars($_POST["address"]) . ", " . htmlspecialchars($_POST["city"]). ", " . htmlspecialchars($_POST["state"]) . ", " . htmlspecialchars($_POST["zip"])?>