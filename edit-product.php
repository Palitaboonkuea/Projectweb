<?php
$pdo = new PDO("mysql:host=localhost; dbname=shop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
?>

<?php
$stmt = $pdo->prepare("UPDATE product SET ชื่อสินค้า=?,ราคาสินค้า=?,จำนวนสินค้า=?,รายละเอียดสินค้า=?,รหัสพนักงาน=?,รหัสประเภทสินค้า=? WHERE รหัสสินค้า=?"); 
$stmt->bindParam(1, $_POST["ชื่อสินค้า"]);
$stmt->bindParam(2, $_POST["ราคาสินค้า"]);
$stmt->bindParam(3, $_POST["จำนวนสินค้า"]);
$stmt->bindParam(4, $_POST["รายละเอียดสินค้า"]);
$stmt->bindParam(5, $_POST["รหัสพนักงาน"]);
$stmt->bindParam(6, $_POST["รหัสประเภทสินค้า"]);
$stmt->bindParam(7, $_POST["รหัสสินค้า"]);
if ($stmt->execute()) 

?>
<html>
    <head>
</head>
    <body>
        แก้ไขสำเร็จ
</body>
    </html>
