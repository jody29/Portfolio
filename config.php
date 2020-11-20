<?php
$server = "localhost";
$user = "jodylorist_nl_jodylorist";
$password = "__________";
$dbname = "jodylorist_nl_jodylorist";


$mysqli = new mysqli($server, $user, $password, $dbname);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
