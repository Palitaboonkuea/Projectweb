<?php
include 'condb.php';

$รหัสสินค้า=$_POST['รหัสสินค้า'];
$ชื่อสินค้า=$_POST['ชื่อสินค้า'];
$ราคาสินค้า=$_POST['ราคาสินค้า'];
$จำนวนสินค้า=$_POST['จำนวนสินค้า'];
$รายละเอียดสินค้า=$_POST['รายละเอียดสินค้า'];
$รหัสพนักงาน=$_POST['รหัสพนักงาน'];
$รหัสประเภทสินค้า=$_POST['รหัสประเภทสินค้า'];

if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name ="";
    }


$sql="INSERT INTO product(รหัสสินค้า,ชื่อสินค้า,ราคาสินค้า,จำนวนสินค้า,รายละเอียดสินค้า,รหัสพนักงาน,รหัสประเภทสินค้า,img) 
VALUES('$รหัสสินค้า','$ชื่อสินค้า','$ราคาสินค้า','$จำนวนสินค้า','$รายละเอียดสินค้า','$รหัสพนักงาน','$รหัสประเภทสินค้า','$new_image_name')";
$result=mysqli_query($conn,$sql);
header("location:lipstick.php");
?>

