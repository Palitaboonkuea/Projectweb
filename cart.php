<?php
// session_start();
include 'connect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script> scr="bootstrap/js/bootstrap.bundle.min.js"</script> 
</head>
<body>
<?php include "menu.php"?>
<br>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
        <div class="row">
            <div class="col-md">
            <div class="alert alert-danger h3 center" role="alert">
                ตะกร้าสินค้า
            </div>
                <table class="table table-hover">
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th>เพิ่ม/ลบ</th>
                        <th>ลบ</th>
                    </tr>
                    <?php
                    $Total = 0;
                    $sumPrice = 0;
                    $m = 1;

                    for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++) { 
                        if(($_SESSION["strProductID"][$i]) != ""){
                            $sql1="SELECT * FROM product WHERE รหัสสินค้า = '" . $_SESSION["strProductID"][$i] . "'";
                            $result1 = mysqli_query($conn,$sql1);
                            $row_pro =mysqli_fetch_array($result1);
                            
                            $_SESSION["ราคาสินค้า"] = $row_pro['ราคาสินค้า'];
                            $Total = $_SESSION["strQty"][$i];
                            $sum = $Total * $row_pro['ราคาสินค้า'];
                            $sumPrice = $sumPrice + $sum;
                            $_SESSION['sumPrice']= $sumPrice;
                    ?>
                    <tr>
                        <td><?=$m?></td>
                        <td>
                        <!-- <img src="imgs/<?=$row_pro['img']?>" width="80" height="100" class="border"> -->
                        <?=$row_pro['ชื่อสินค้า']?>
                        </td>
                        <td><?=$row_pro['ราคาสินค้า']?></td>
                        <td><?=$_SESSION["strQty"][$i]?></td>
                        <td><?=$sum?></td>
                        <td>
                        <a href="con-order.php?รหัสสินค้า=<?=$row_pro['รหัสสินค้า']?>" class="btn btn-outline-danger">+</a>
                        <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                        <a href="con-orderdelete.php?รหัสสินค้า=<?=$row_pro['รหัสสินค้า']?>" class="btn btn-outline-danger">-</a>
                        <?php } ?>
                        </td>
                        <td><a href="pro_delete.php?Line=<?=$i?>" ><img src="imgs/ลบ.png" width="30"></a></td>
                    </tr>
                    <?php 
                        $m=$m+1;
                        }
                    } ?>
                    <tr>
                        <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                        <td class="text-center"><?=number_format($sumPrice,2)?></td>
                        <td>บาท</td>
                    </tr>
                </table>
                <div style="text-align:right">
                <a href="homepage.php"><button type="button" class="btn btn-outline-primary">เลือกสินค้า</button></a> |
                <button type="submit" class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
            <div class="alert alert-success">
                ข้อมูลสำหรับจัดส่งสินค้า
                </div>
                Username:
                <input type="text" name="cus_uname" class="form-control" required value='<?=$_SESSION["username"]?>'><br>
            <br>
            </div>
        </div>
        </form>
    </div>
</body>
</html>