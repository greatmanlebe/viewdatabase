<?php

function opendatabase($database, $password) {
    $servername = "localhost"; 
    $username = "root";     
         
 $conn = new mysqli($servername, $username, $password, $database);

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
$tables = opendatabase($database, $password);

foreach ($tables as $table) {
    echo $table . "<br>";
}
?>
