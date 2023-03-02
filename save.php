<?php
    include "connect.php";
    session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$c_password = $_POST["c_password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
if($password != $c_password)
{
    $_SESSION['ERROR'] = "password  not match";
    header('location: register_form.php');
}else
$sql = "INSERT INTO member(username,name,password,email,phone,address)
        VALUES ('$username','$name','$password','$email','$phone','$address')";
$result = mysqli_query($conn,$sql);
if($result)
{
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
    header('location: login_form.php');
}else
{
    echo "error:" .$sql. "<br>" . mysqli_error($conn);
    echo "<script> alert('ไม่สำเร็จ');</script>";
    header('location: register_form.php');
}

