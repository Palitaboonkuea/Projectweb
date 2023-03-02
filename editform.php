<?php
$pdo = new PDO("mysql:host=localhost; dbname=shop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
?>

<?php
$stmt = $pdo->prepare("SELECT * FROM product WHERE รหัสสินค้า = ?");
$stmt->bindParam(1, $_GET["รหัสสินค้า"]); 
$stmt->execute(); 
$row = $stmt->fetch(); 
?>
<html>
<head><meta charset="utf-8">
<style>
    *{
            padding: 0;
            margin: 0;
        }
    h1{
        text-align: center;
    }
    body{
            box-sizing: border-box;
        }
        .menu-bar{
            background: pink;
            text-align: center;
        }
        .menu-bar ul{
            display: inline-flex;
            list-style: none;
            color: #fff;
        }
        .menu-bar ul li{
            width: 120px;
            margin: 15px;
            padding: 15px;
        }
        .active,.menu-bar ul li:hover{
            background: skyblue;
            border-radius: 3px;
        }
        .layout
        {
            text-align: center;
        }
    </style>

</head>
<body>
<div class="menu-bar">
    <ul>
        <li class="active">
            <a href="http://localhost/manage.html">Home</a>
        </li>
        <li>
            About us
        </li>
    </ul>
</div>
    <h1>แก้ไขสินค้า</h1>
    <div class="layout">
<form action="edit-product.php" method="post">
<img src='LP/<?=$row["รหัสสินค้า"]?>.jpg' width='200'><br>
<input type="hidden" name="รหัสสินค้า" value="<?=$row["รหัสสินค้า"]?>">
ชื่อสินค้า : <input type="text" name="ชื่อสินค้า" value="<?=$row["ชื่อสินค้า"]?>"><br>
ราคา:<input type="number" name="ราคาสินค้า" value="<?=$row["ราคาสินค้า"]?>"><br>
จำนวนสินค้า <input type="number" name="จำนวนสินค้า" value="<?=$row["จำนวนสินค้า"]?>"><br>
รายละเอียดสินค้า<input type="text" name="รายละเอียดสินค้า" value="<?=$row["รายละเอียดสินค้า"]?>"><br>
รหัสพนักงาน : <input type="text" name="รหัสพนักงาน" value="<?=$row["รหัสพนักงาน"]?>"><br>
รหัสประเภทสินค้า : <input type="text" name="รหัสประเภทสินค้า" value="<?=$row["รหัสประเภทสินค้า"]?>"><br>
<input type="submit" value="แก้ไขสินค้า ">
</form>
</div>
</body>
</html>