<?php
$pdo = new PDO("mysql:host=localhost; dbname=shop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
?>

<?php
$stmt = $pdo->prepare("DELETE FROM product WHERE รหัสสินค้า=?");
$stmt->bindParam(1, $_GET["รหัสสินค้า"]); 
if ($stmt->execute()) 
header("location:lipstick.php"); 
?>