<?php
    session_start();
    require('fetch.php');

    $db = get_db();

    $username = $_SESSION['username'];
    $stmt = $db->prepare('SELECT * FROM contact_information WHERE user_name=:username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();   
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<DOCTYPE! html>
<html>
<head>
    <title>Your information</title>
</head>    
<body>
    <?php include('nav.php');?>
    <form action="edit.php" id="editInfo"></form>
    <form action="destroy.php"> 
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">First name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['first_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Last name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['last_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['user_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['email'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['phone'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Address 1</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['address_1'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Address 2</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['address_2'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['city'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">State</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['state'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Zip</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows['zip'] ?>">
        </div>
          <div class="text-right btn-toolbar">
                <button type="submit" class="btn-info btn" form="editInfo">Edit</button>
        
                <button type="submit" class="btn-info btn">Logout</button>

          </div>


        

     </div>
    </form>
  
</body>
</html>    
