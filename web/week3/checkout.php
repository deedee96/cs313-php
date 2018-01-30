<?php
session_start();


if('POST' === $_SERVER['REQUEST_METHOD']) {
    if( ! empty($_POST['temp'])) {
        $json = $_POST['temp'];
        $_SESSION['total'] = getTotal($json);
    }
} else {
    $_SESSION["someString"] = '[{&quot;name&quot;:&quot;gudetama&quot;,&quot;qty&quot;:0,&quot;cost&quot;:12},{&quot;name&quot;:&quot;keroppi&quot;,&quot;qty&quot;:0,&quot;cost&quot;:12},{&quot;name&quot;:&quot;badtz&quot;,&quot;qty&quot;:0,&quot;cost&quot;:12}]';
    
}







if (!empty($json)) {
    if (!empty($_POST['remove_item'])) {
        $count = 0;
        $jsonString = "[";
        $my_obj = json_decode($json, true);
        foreach ($my_obj as $key => $value) {
        if ($value["name"] != $_POST['remove_item']) {
            $count++;
            }
        }
        unset($my_obj[$count]);
        $count = 0;
        foreach ($my_obj as $key => $value) {
            $jsonString .= "{&quot;name&quot;:&quot;";
            $jsonString .= $value["name"];
            $jsonString .= "&quot;,&quot;qty&quot;:";
            $jsonString .= $value["qty"];
            $jsonString .= ",&quot;cost&quot;:";
            $jsonString .= $value["cost"];
            if ($count != sizeof($my_obj) - 1) {
                $jsonString .= "},";
            }
            else {
                $jsonString .= "}]";
            }

            $count++;
        
        }
        
    }
    else {
    $count = 0;
    $jsonString = "[";
    $my_obj = json_decode($json, true);
    foreach ($my_obj as $key => $value) {
        if ($value["name"] == $item) {
            $my_obj[$count]["qty"] += 1;
        }
        
        $jsonString .= "{&quot;name&quot;:&quot;";
        $jsonString .= $value["name"];
        $jsonString .= "&quot;,&quot;qty&quot;:";
        $jsonString .= $value["qty"];
        $jsonString .= ",&quot;cost&quot;:";
        $jsonString .= $value["cost"];
        if ($count != 2) {
            $jsonString .= "},";
        }
        else {
            $jsonString .= "}]";
        }

        $count++;
            
    }
    
        
    }
    
    $_SESSION["someString"] = $jsonString;
    

}

function getTotal($my_json) {
    $total = 0;
    $index = 0;
    if (!empty($my_json)) {
        
        $myString = $_SESSION["someString"];
        $obj = json_decode($my_json);
        
        foreach ($obj as $key => $value) {
            $individual = $obj[$index]->qty * $obj[$index]->cost;
            $total += $individual;
        }
        return $total;
            
    } else {
        return 0;
    }
}

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
      

    <title>Check Out</title>
  </head>
  <body>
      <h1>Please confirm and fill out the information below to check out </h1>
      <br><br>
      
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $row = 1;
        $my_obj = json_decode($_POST['temp']);
        foreach ($my_obj as $key => $value) { ?>
        <tr>
            <th scope="row"><?php echo $row;?></th>
            <td><?php echo $value->name;?></td>
            <td><?php echo $value->qty;?></td>
            <td><?php echo $value->cost*$value->qty;?></td>
            <td><form method="post", action="checkout.php">
                <input type="hidden" name="remove_item" value="<?php echo $value->name;?>">
                <input type="hidden" name="temp" value="<?php echo $_SESSION["someString"];?>">
                <button type="submit">Remove</button>
            </form>
            </td>
        </tr>
        <?php 
                                             $row++;
                                            } ?>
    <tr>
      <th scope="row">Total</th>
      <td colspan="2"></td>
      <td><?php echo $_SESSION['total'];?></td>
    </tr>
  </tbody>
</table>
      
      
      <div class="center">
                <form method="post" action="confirm.php">

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state">
        <option selected>Choose...</option>
        	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip">
    </div>
      <input type="hidden" name="total" value="<?php echo $_SESSION['total'];?>">
  </div>
  <div align="center">
        <a href="index.php"><input type="button" class="btn btn-primary" value="Continue Shopping" /></a>
        <button type="submit" class="btn btn-primary">Check out</button>
 </div>


 
</form>
      </div>
      

      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="myScript.js"></script>
  </body>
</html>