<?php
//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="students";

//create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("connection failed". mysqli_connect_error());
}
//echo"connection success";