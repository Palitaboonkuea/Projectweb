<?php include 'connect.php'?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blush</title>
        <link rel="stylesheet" href=pre-product.css>
    </head>
    <body>
         <?php include "menu.php";?>
        <div class ="topcon">
                <img src="https://i.pinimg.com/originals/1f/c1/0a/1fc10a2d4c280f773c4e95bd7b44b1dd.jpg">
                <h1 class = "type">Blush</h1>
        </div>
        <br><br>
<table width="600" border="1" align="center" bordercolor="#FFFFFF">
  <tr>
    <td width="91" align="center" bgcolor="#FEC9CB"><strong>รูปสินค้า</strong></td>
    <td width="200" align="center" bgcolor="#FEC9CB"><strong>ชื่อสินค้า</strong></td>
    <td width="44" align="center" bgcolor="#FEC9CB"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#FEC9CB"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("connect.php");
  $sql = "SELECT * FROM product WHERE รหัสประเภทสินค้า ='BO' ORDER BY รหัสสินค้า"; 
  $result = mysqli_query($conn, $sql);
  ?>
  <?php while($row = mysqli_fetch_array($result))
  { ?>
    <tr>
	<td align='center' bgcolor="#FEC9CB"><img src="imgs/<?=$row['รหัสสินค้า']?>.jpg " width="150"></td>
	<td align='left' bgcolor="#FEC9CB"><?= $row ["ชื่อสินค้า"]?></td>
    <td align='center'bgcolor="#FEC9CB"><?= number_format($row["ราคาสินค้า"],2)?></td>
    <td align='center' bgcolor="#FEC9CB" class="cdetail"><a href="detail-pro.php?รหัสสินค้า=<?=$row['รหัสสินค้า']?>">
    <button>คลิก</button></a></td>
	</tr>
  <?php
  } ?>
</table>
<br><br>
    </body>
</html>

