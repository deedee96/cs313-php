<?php
session_start();
require('nav.php');
require('fetch.php');
$country_name = $_GET["country_name"];
$username = $_SESSION['username'];
$db = get_db();

$stmt = $db->prepare('select * from thread where discussion_country=:country');
$stmt->bindValue(':country', $country_name, PDO::PARAM_STR);
$stmt->execute();   
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">Create a new topic</button>
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">What would you like to discuss?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="thread" action="insertThread.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Content:</label>
            <textarea class="form-control" id="message-text" name="content" required></textarea>
          </div>
         <input type=hidden name="country_name" <?php echo "value=$country_name" ?> >

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="thread">Submit</button>
      </div>
    </div>
  </div>
</div>
      <br>

<div class="container-fluid">
    <table id="total votes" class="table table-hover text-centered">
        <thead>
            <tr>
                <th>User</th>
                <th>Topic</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><a href='reply.php?thread_id=" .$row['thread_id'] . "'>" . $row['title'] . "</a></td>";
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