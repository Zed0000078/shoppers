<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="shoppers";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn){
    echo "";
}else{
    echo "not";
}

?>