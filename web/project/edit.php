<?php
    session_start();
    require('fetch.php');

    $db = get_db();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $stmt = $db->prepare('SELECT * FROM contact_information WHERE user_name=:username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();   
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $address1 = $row['address_1'];
    $address2 = $row['address_2']; 

    $state = $row['state'];
    $zip = $row['zip'];
    $city = $row['city'];
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $phone = $row['phone'];
    $email = $row['email'];
?>



<!doctype html>
<html lang="en">
  <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Required meta tags -->
    <style>
        body {
            background-image: url("https://wallpaperscraft.com/image/golden_gate_bridge_san_francisco_strait_66225_1920x1080.jpg");
        }
      </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Golden Trust</title>
  </head>
  <body>
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row text-white">
                    <div class="col-sm-10 offset-sm-1 text-center">
                        <div class="info-form">
                    <form method="post" action="editDirect.php">
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">First name</label>
                          <input type="text" name="fname" class="form-control" id="validationDefault01" placeholder="First name" <?php echo 'value=' .$fname; ?> required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">Last name</label>
                          <input type="text" <?php echo 'value=' .$lname; ?> name="lname" class="form-control" id="validationDefault02" placeholder="Last name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefaultUsername">Username</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            </div>
                            <input type="text" <?php echo 'value=' .$username; ?> name="username" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" readonly>
                          </div>
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Password</label>
                          <input type="password" <?php echo 'value=' .$password; ?> name="password" class="form-control" id="inputPassword5" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input type="email" <?php echo 'value=' .$email; ?> name="email" class="form-control" id="inputEmail4" placeholder="Email" readonly>
                        </div>
                      </div>
                     <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" <?php echo 'value=' .$address1; ?> name="address1" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text"  <?php  if(!empty($address2)) { echo 'value=' .$address2; } ?> name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" <?php echo 'value=' .$phone; ?> name="phone" class="form-control" id="phone" placeholder="123-456-7890" required>
                    </div>                        
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">City</label>
                          <input name="city" <?php echo 'value=' .$city; ?> type="text" class="form-control" id="city" placeholder="City" required>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationDefault04">State</label>
                            <select class="form-control" id="validationDefault04" name="state" >
                                <option value="AK" <?php if($state == "AK") { echo "selected"; } ?>>AK</option>
                                <option value="AR" <?php if($state == "AR") { echo "selected"; } ?>>AR</option>	
                                <option value="AZ" <?php if($state == "AZ") { echo "selected"; } ?>>AZ</option>
                                <option value="CA" <?php if($state == "CA") { echo "selected"; } ?>>CA</option>
                                <option value="CO" <?php if($state == "CO") { echo "selected"; } ?>>CO</option>
                                <option value="CT" <?php if($state == "CT") { echo "selected"; } ?>>CT</option>
                                <option value="DC" <?php if($state == "DC") { echo "selected"; } ?>>DC</option>
                                <option value="DE" <?php if($state == "DE") { echo "selected"; } ?>>DE</option>
                                <option value="FL" <?php if($state == "FL") { echo "selected"; } ?>>FL</option>
                                <option value="GA" <?php if($state == "GA") { echo "selected"; } ?>>GA</option>
                                <option value="HI" <?php if($state == "HI") { echo "selected"; } ?>>HI</option>
                                <option value="IA" <?php if($state == "IA") { echo "selected"; } ?>>IA</option>	
                                <option value="ID" <?php if($state == "ID") { echo "selected"; } ?>>ID</option>
                                <option value="IL" <?php if($state == "IL") { echo "selected"; } ?>>IL</option>
                                <option value="IN" <?php if($state == "IN") { echo "selected"; } ?>>IN</option>
                                <option value="KS" <?php if($state == "KS") { echo "selected"; } ?>>KS</option>
                                <option value="KY" <?php if($state == "KY") { echo "selected"; } ?>>KY</option>
                                <option value="LA" <?php if($state == "LA") { echo "selected"; } ?>>LA</option>
                                <option value="MA" <?php if($state == "MA") { echo "selected"; } ?>>MA</option>
                                <option value="MD" <?php if($state == "MD") { echo "selected"; } ?>>MD</option>
                                <option value="ME" <?php if($state == "ME") { echo "selected"; } ?>>ME</option>
                                <option value="MI" <?php if($state == "MI") { echo "selected"; } ?>>MI</option>
                                <option value="MN" <?php if($state == "MN") { echo "selected"; } ?>>MN</option>
                                <option value="MO" <?php if($state == "MO") { echo "selected"; } ?>>MO</option>	
                                <option value="MS" <?php if($state == "MS") { echo "selected"; } ?>>MS</option>
                                <option value="MT" <?php if($state == "MT") { echo "selected"; } ?>>MT</option>
                                <option value="NC" <?php if($state == "NC") { echo "selected"; } ?>>NC</option>	
                                <option value="NE" <?php if($state == "NE") { echo "selected"; } ?>>NE</option>
                                <option value="NH" <?php if($state == "NH") { echo "selected"; } ?>>NH</option>
                                <option value="NJ" <?php if($state == "NJ") { echo "selected"; } ?>>NJ</option>
                                <option value="NM" <?php if($state == "NM") { echo "selected"; } ?>>NM</option>			
                                <option value="NV" <?php if($state == "NV") { echo "selected"; } ?>>NV</option>
                                <option value="NY" <?php if($state == "NY") { echo "selected"; } ?>>NY</option>
                                <option value="ND" <?php if($state == "ND") { echo "selected"; } ?>>ND</option>
                                <option value="OH" <?php if($state == "OH") { echo "selected"; } ?>>OH</option>
                                <option value="OK" <?php if($state == "OK") { echo "selected"; } ?>>OK</option>
                                <option value="OR" <?php if($state == "OR") { echo "selected"; } ?>>OR</option>
                                <option value="PA" <?php if($state == "PA") { echo "selected"; } ?>>PA</option>
                                <option value="RI" <?php if($state == "RI") { echo "selected"; } ?>>RI</option>
                                <option value="SC" <?php if($state == "SC") { echo "selected"; } ?>>SC</option>
                                <option value="SD" <?php if($state == "SD") { echo "selected"; } ?>>SD</option>
                                <option value="TN" <?php if($state == "TN") { echo "selected"; } ?>>TN</option>
                                <option value="TX" <?php if($state == "TX") { echo "selected"; } ?>>TX</option>
                                <option value="UT" <?php if($state == "UT") { echo "selected"; } ?>>UT</option>
                                <option value="VT" <?php if($state == "VT") { echo "selected"; } ?>>VT</option>
                                <option value="VA" <?php if($state == "VA") { echo "selected"; } ?>>VA</option>
                                <option value="WA" <?php if($state == "WA") { echo "selected"; } ?>>WA</option>
                                <option value="WI" <?php if($state == "WI") { echo "selected"; } ?>>WI</option>	
                                <option value="WV" <?php if($state == "WV") { echo "selected"; } ?>>WV</option>
                                <option value="WY" <?php if($state == "WY") { echo "selected"; } ?>>WY</option>
                            </select>	                    
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationDefault05">Zip</label>
                          <input type="zip" <?php echo 'value=' .$zip; ?> class="form-control" id="validationDefault05"  placeholder="Zip" size=5 maxlength=5  required>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>