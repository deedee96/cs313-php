<?php 
 session_start();
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
                        <h1 class="display-3">Welcome to Golden Trust</h1>
                        <p> <?php if (isset($_SESSION['err_message'])) {
                                echo $_SESSION['err_message'];
    
                            }
                            ?>
                        </p>
                        <div class="info-form">
                    <form method="post" action="signUpValidation.php">
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">First name</label>
                          <input type="text" name="fname" class="form-control" id="validationDefault01" placeholder="First name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">Last name</label>
                          <input type="text" name="lname" class="form-control" id="validationDefault02" placeholder="Last name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefaultUsername">Username</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            </div>
                            <input type="text" name="username" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Confirm Password</label>
                          <input type="password" name="password2" class="form-control" id="confirm_password" placeholder="Confirm password" required>
                        </div>

                      </div>
                    <div class="form-group">
                          <label for="inputEmail4">Email</label>
                          <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                    </div>
                     <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-group">
                            <label for="inputAddress2">Phone number</label>
                            <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="123-456-7890" required>
                    </div>                        
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">City</label>
                          <input type="text" name="city" class="form-control" id="validationDefault03" placeholder="City" required>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationDefault04">State</label>
                            <select class="form-control" id="validationDefault04" name="state">
                                <option value="AL">AL</option>
                                <option value="AK">AK</option>
                                <option value="AR">AR</option>	
                                <option value="AZ">AZ</option>
                                <option value="CA">CA</option>
                                <option value="CO">CO</option>
                                <option value="CT">CT</option>
                                <option value="DC">DC</option>
                                <option value="DE">DE</option>
                                <option value="FL">FL</option>
                                <option value="GA">GA</option>
                                <option value="HI">HI</option>
                                <option value="IA">IA</option>	
                                <option value="ID">ID</option>
                                <option value="IL">IL</option>
                                <option value="IN">IN</option>
                                <option value="KS">KS</option>
                                <option value="KY">KY</option>
                                <option value="LA">LA</option>
                                <option value="MA">MA</option>
                                <option value="MD">MD</option>
                                <option value="ME">ME</option>
                                <option value="MI">MI</option>
                                <option value="MN">MN</option>
                                <option value="MO">MO</option>	
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="NC">NC</option>	
                                <option value="NE">NE</option>
                                <option value="NH">NH</option>
                                <option value="NJ">NJ</option>
                                <option value="NM">NM</option>			
                                <option value="NV">NV</option>
                                <option value="NY">NY</option>
                                <option value="ND">ND</option>
                                <option value="OH">OH</option>
                                <option value="OK">OK</option>
                                <option value="OR">OR</option>
                                <option value="PA">PA</option>
                                <option value="RI">RI</option>
                                <option value="SC">SC</option>
                                <option value="SD">SD</option>
                                <option value="TN">TN</option>
                                <option value="TX">TX</option>
                                <option value="UT">UT</option>
                                <option value="VT">VT</option>
                                <option value="VA">VA</option>
                                <option value="WA">WA</option>
                                <option value="WI">WI</option>	
                                <option value="WV">WV</option>
                                <option value="WY">WY</option>
                            </select>	                    
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationDefault05">Zip</label>
                          <input type="text" class="form-control" id="validationDefault05" name="zip" placeholder="Zip" maxlength="5" size="5" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                          <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                          </label>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Sign up</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
      
    <script>
        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>