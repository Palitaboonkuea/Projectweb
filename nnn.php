<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
<title>Report-sale</title>
</head>
<body>
<?php include "connect1.php" ?>
<header>
        <?php include "menu.php";?>
</header>
<?php
$stmt = $pdo->prepare("SELECT DISTINCT `order`.วันที่,SUM(product.ราคาสินค้า * ordering.จำนวน) AS ยอดขาย 
FROM ordering INNER JOIN product ON (product.รหัสสินค้า=ordering.รหัสสินค้า) INNER JOIN `order`
 ON (`order`.เลขออเดอร์=ordering.เลขออเดอร์) AND `order`.สถานะการชําระเงิน='สำเร็จ' GROUP BY `order`.วันที่");
$stmt->execute();
?>
<h2>ยอดขาย</h2>
<nav>
<table>
    <tr>
        <th >วันที่</th>
        <th>ยอดขาย</th> 
    </tr><br>
<?php while ($row = $stmt->fetch()) 
{ ?>
    <tr>
        <td id="colorw"><?=$row ["วันที่"]?></td></td>
        <td id="colorsale"><?=$row ["ยอดขาย"]?> บ.<br></td>
<?php } ?>
</tr>
</table>
</nav>


<?php
$stmt = $pdo->prepare("SELECT SUM(product.ราคาสินค้า * ordering.จำนวน) AS รวม FROM ordering 
INNER JOIN product ON (product.รหัสสินค้า= ordering.รหัสสินค้า) INNER JOIN `order`
ON (`order`.เลขออเดอร์=ordering.เลขออเดอร์) AND `order`.สถานะการชําระเงิน='สำเร็จ'");
$stmt->execute();
?>
<footer>
<?php while ($row = $stmt->fetch()) 
{ ?>
    <b>รวม : <?=$row ["รวม"]?> บาท</b>
<?php } ?>
</footer>
</body>
</html>