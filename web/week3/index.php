<?php 
session_start();




if('POST' === $_SERVER['REQUEST_METHOD']) {
    if( ! empty($_POST['temp'])) {
        $json = $_POST['temp'];
    }
    if( ! empty($_POST['item'])) {
        $item = $_POST['item'];
    }
} else {
    $_SESSION["someString"] = '[{&quot;name&quot;:&quot;gudetama&quot;,&quot;qty&quot;:0,&quot;cost&quot;:10},{&quot;name&quot;:&quot;keroppi&quot;,&quot;qty&quot;:0,&quot;cost&quot;:11},{&quot;name&quot;:&quot;badtz&quot;,&quot;qty&quot;:0,&quot;cost&quot;:12}]';
    
}





if (!empty($json)) {
    $count = 0;
    $jsonString = "[";
    $my_obj = json_decode($json);
    foreach ($my_obj as $key => $value) {
        if ($value->name == $item) {
            $my_obj[$count]->qty += 1;
        }
        
        $jsonString .= "{&quot;name&quot;:&quot;";
        $jsonString .= $value->name;
        $jsonString .= "&quot;,&quot;qty&quot;:";
        $jsonString .= $value->qty;
        $jsonString .= ",&quot;cost&quot;:";
        $jsonString .= $value->cost;
        if ($count != 2) {
            $jsonString .= "},";
        }
        else {
            $jsonString .= "}]";
        }

        $count++;
            
    }
    $_SESSION["someString"] = $jsonString;
}



function getCount($my_json) {
    $numCount = 0;
    $index = 0;
    if (!empty($my_json)) {
        $myString = $_SESSION["someString"];
        $obj = json_decode($my_json);
        foreach ($obj as $key => $value) {
            $numCount += $obj[$index]->qty;
            $index++;
        }
        return $numCount + 1;
            
    } else {
        return 0;
    }
}

$_SESSION['count'] = getCount($json);

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
      

<title>Kawaii</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Prove 03</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active" >
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Assignments</a>
              </li>
            </ul>
              <form method="post" action="checkout.php">
                  <input type="hidden" name="temp" value="<?php echo $_SESSION["someString"] ?>" />
                  <button type="submit" class="btn btn-primary">Cart <span class="badge badge-light"><?php echo $_SESSION['count'] ?></span></button>
              </form>
                
          </div>
        </nav>


      <div class="slogan">
          <div class="slogan-content">
              Kawaii<br>
              <p>"かわいい"</p>
          </div>
      </div>
      
      <br>
      <hr>
      <br>
    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="gudemata.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Gudetama</h5>
            <h6 class="card-title">Price: $10</h6>
          <p class="card-text">Eggs are yummy… boiled, baked or raw. There are many ways to make an egg, but eggs are so lazy (gude gude in Japanese). Look closely and you will see the eggs that you eat lack spunk.
            </p>
        </div>
        <div class="card-footer">
            <form method="post" action="index.php">
                <input type="hidden" name="item" value="gudetama">
                <input type="hidden" name="temp" value="<?php echo $_SESSION["someString"] ?>" />
                <input type="submit" value="Add to cart" class="btn btn-outline-primary">
            </form>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="https://www.sanrio.com/media/W1siZiIsIjIwMTYvMDYvMTMvMjEvMDUvMDYvMjAwL0tSX29oLmdpZiJdXQ/KR_oh.gif?sha=3e14f3fb8bd762c5" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Keroppi</h5>
            <h6 class="card-title">Price: $11</h6>
          <p class="card-text">Keroppi lives with his brother, sister, and parents in a big house on the edge of Donut Pond, the largest and bluest pond around. Keroppi's friends share his love of playing games, especially baseball and boomerangs.</p>
        </div>
        <div class="card-footer">
            <form method="post" action="index.php">
                <input type="hidden" name="item" value="keroppi">
                <input type="hidden" name="temp" value="<?php echo $_SESSION["someString"] ?>" />
                <input type="submit" value="Add to cart" class="btn btn-outline-primary">
            </form>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="badtz.jpg">
        <div class="card-body">
          <h5 class="card-title">Badtz-Maru</h5>
          <h6 class="card-title">Price: $12</h6>
          <p class="card-text">Badtz-Maru is one mischievous little penguin. He lives with his mother and pinball playing father in Gorgeoustown. </p>
        </div>
        <div class="card-footer">
            <form method="post" action="index.php">
            <input type="hidden" name="item" value="badtz">
                <input type="hidden" name="temp" value="<?php echo $_SESSION["someString"] ?>" />
                <input type="submit" value="Add to cart" class="btn btn-outline-primary">
            </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="myScript.js"></script>
  </body>
</html>