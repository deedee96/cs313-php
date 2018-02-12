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

    $username = 'admin';
    $stmt = $db->prepare('SELECT * FROM contact_information WHERE user_name=:username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();   
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<DOCTYPE! html>
<html>
<head>
    <title>Your information</title>
</head>    
<body>
    <?php include('nav.php');?>
    <form>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">First name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['first_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Last name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['last_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['user_name'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['email'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['phone'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Address 1</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['address_1'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Address 2</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['address_2'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">State</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['state'] ?>">
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Zip</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $rows[0]['zip'] ?>">
        </div>
        

     </div>
    </form>
  
</body>
</html>    
