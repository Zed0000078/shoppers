<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppers";

$con = mysqli_connect($servername, $username, $password, $dbname);
if ($con) {
   echo "";
} else {
    echo "Connection not done";
}
?>