<?php 
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

//create connection
$conn = mysqli_connect($severname,$username,$password,$dbname);

if(!$conn)
{
    die ("connection filed :".mysqli_connect_error());
}

