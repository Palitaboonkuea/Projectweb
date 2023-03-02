<?php
session_start();

// //เช็ดการล็อคอิน
// if(!isset($_SESSION["username"]))
// {
//     $show=header("location:login.php");
//     exit;
// }

include "connect.php";
$cusuname = $_POST['cus_uname'];

$sql = "INSERT INTO `order`(สถานะการชําระเงิน,รวมจำนวนเงิน,Username) 
VALUES ('รอดำเนินการ','" . $_SESSION["sumPrice"] . "','$cusuname')";
mysqli_query($conn,$sql);

$orderID = mysqli_insert_id($conn);

for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if(($_SESSION["strProductID"][$i]) != ""){
    //ดึงข้อมูลสินค้า
    $sql1 = "SELECT * from product where รหัสสินค้า ='" . $_SESSION["sumPrice"] . "' ";
    $result1 = mysqli_query($conn,$sql1);
    // $row1 = mysqli_fetch_array($result1);
    // $price = $row1['ราคาสินค้า'];
    $total = $_SESSION["strQty"][$i] * $price;

    $sql2 = "INSERT INTO `ordering`(เลขออเดอร์,รหัสสินค้า,จำนวน)
    VALUES('$orderID','" . $_SESSION["strProductID"][$i]. "','" . $_SESSION["strQty"][$i]. "')";
    if(mysqli_query($conn,$sql2)){
        // ตัดสต็อกสินค้า
        $sql3 = "UPDATE product set จำนวนสินค้า = จำนวนสินค้า - '" . $_SESSION["strQty"][$i] . "' 
        where รหัสสินค้า ='" . $_SESSION["strProductID"][$i] ."' ";
        mysqli_query($conn,$sql3);
        // echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
        //echo "<script> window.location='homepage.php';</script>";
       echo "<script> window.location='payment.php?เลขออเดอร์=$orderID&Username=$cusuname';</script>";
    }
    }
}
mysqli_close($conn);
unset($_SESSION['inLine']);
unset($_SESSION['strProductID']);
unset($_SESSION['strQty']);
unset($_SESSION['sumPrice']);
session_destroy();
?>