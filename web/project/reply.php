<?php 
session_start();
require('fetch.php');
require('nav.php');
$username = $_SESSION['username'];
$thread_id = $_GET['thread_id'];
$db = get_db();



$stmt = $db->prepare('SELECT * FROM thread WHERE thread_id=:thread_id');
$stmt->bindValue(':thread_id', $thread_id, PDO::PARAM_INT);
$stmt->execute();   
$heading = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt2 = $db->prepare('SELECT * FROM reply WHERE thread_id=:thread_id');
$stmt2->bindValue(':thread_id', $thread_id, PDO::PARAM_INT);
$stmt2->execute();   
$rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">Reply</button>
      
      <h1><?php echo $heading['title']; ?></h1>
      <h5 style="font-style:italic;"><?php echo $heading['content']; ?></h5>
      Post by: <?php echo "<b>" . $heading['username'] . "</b>"; ?><br>
      On: <?php echo $heading['date']; ?>
      
      
      
      
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter in your reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="thread" action="insertReply.php" method="post">
          <div class="form-group">
            <label for="message-text" class="form-control-label">Reply:</label>
            <textarea class="form-control" id="message-text" name="content" required></textarea>
          </div>
         <input type=hidden name="thread_id" <?php echo "value=$thread_id" ?> >

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="thread">Submit</button>
      </div>
    </div>
  </div>
</div>
      

      <br><br>
<div class="container-fluid">
    <table id="total votes" class="table table-hover text-centered">
        <thead>
            <tr>
                <th>User</th>
                <th>Reply</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" .$row['content'] ."</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
                }
            ?>
        </tbody>   
    </table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>