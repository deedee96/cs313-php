<?php    

function get_db() {
    $db = NULL;
    try {
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
        
        
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


        
    }
    	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		die();
	}

    return $db;
}

?>