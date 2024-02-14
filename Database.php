<?php
function opendatabase($database, $password, $username, $servername, $port ) {
   $conn = new mysqli($servername, $username, $password, $database, $port);

 if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $tables = array();
     
    $query = "SHOW TABLES";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }
 while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
    $conn->close();
 return $tables;
}

$database = "your data base name";
$password = "put your data base password";
$username = "enter your user name";
$servername ="enter your server name";
$port ="enter your port";
$tables = opendatabase($database, $password, $username, $servername, $port );

foreach ($tables as $table) {
    echo $table . "<br>";
}
?>
