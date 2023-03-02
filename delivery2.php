<?php include "connect1.php" ?>
<html>
<head>
      <link rel="stylesheet" href="style3.css">
</head>
<body>
<?php  
 $con=mysqli_connect('localhost','root','','shop');   
 $sql=mysqli_query($con,"SELECT * FROM deliverycompany JOIN send ON send.บริษัทจัดส่ง=deliverycompany.บริษัทจัดส่ง
 JOIN ordering ON ordering.เลขออเดอร์=send.เลขออเดอร์");  
 ?>  
       <?php $stmt = $pdo->prepare("SELECT * FROM deliverycompany");
        $stmt->execute();?>
       <br>ธนาคาร: ไทยพาณิชย์ (SCB)
       <br>ชื่อ: Samaang_Shop
       <br>เลขบัญชี:775 0787 9777</br>
 
       
                  <select name="selectid" id="selectid" onchange="transport()">
                  <option value="start">----เลือกบริษัทจัดส่ง----</option>
                  <?php while($row=$stmt->fetch()): ?>
                  <option value="<?=$row["รหัสบริษัท"]?>"><?=$row["บริษัทจัดส่ง"]?></option>
                  <?php endwhile; ?>
         
                
<script>
    fuction transport(){
        let url = "delivery.php";  
       document.location.href= url+"delivery.php?รหัสบริษัท="+id.value;
       window.alert("แกัไขสถานะเป็น '"+id.value+ " ' ");
     }
</script>
</body>
</html>



<?php
if(isset($_POST['submit']) && isset($_FILES['myimg'])){
    $img_name = $_FILES['myimg']['name'];
    $tmp_name = $_FILES['myimg']['tmp_name'];
    $img_size = $_FILES['myimg']['size'];
    $error = $_FILES['myimg']['error'];
    $norder=$_GET['เลขออเดอร์'];  
    $options=$_POST['selectid']; 
    $status="";
    
    if($error === 0){
        if($img_size < 51200){
            $show ="ไม่สามารถ upload ได้เนื่องจากไฟล์มีขนาดไม่ถูกต้อง กรุณาลองใหม่";
            header("Location: payment.php?error=$show&เลขออเดอร์=$norder");
        }else{
            $img_ex= pathinfo($img_name, PATHINFO_EXTENSION);  //ดูนามสกุลไฟล์
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpeg");
            if(in_array($img_ex_lc, $allowed_exs)){
                 $new_img_name = uniqid("Slip_", true).'.'.$img_ex_lc;
                 $img_upload_path = 'slip/'.$new_img_name;
                 move_uploaded_file($tmp_name,$img_upload_path);
                 //update order
                 $sql = "UPDATE `order` SET Slip_img='$new_img_name',สถานะการชําระเงิน='สำเร็จ' where เลขออเดอร์='$norder'";
                 //insert send
                 if(mysqli_query($conn, $sql)){
                     $status="สำเร็จ";
                     if($status=="สำเร็จ"){
                   //  $sql2 = "INSERT INTO send(เลขการจัดส่ง,บริษัทจัดส่ง,สถานะ,เลขออเดอร์)
                   //  VALUES('','','1','$norder')";
                    // mysqli_query($conn, $sql2);
                     }
                   } 
         
             }else{
                 $show ="ไม่สามารถ upload ได้เนื่องจากนามสกุลไฟล์ไม่ถูกต้อง";
                 header("Location: payment.php?error=$show&เลขออเดอร์=$norder");
             }
         }
    }else{
        $show ="เกิดข้อผิดพลาดไม่ทราบสาเหตุ";
        header("Location: payment.php?error=$show&เลขออเดอร์=$norder");
    }
}else{
    header("Location: payment.php");
}
?>




<?php
session_start();
?>
<?php include "connect1.php" ?>
<html>
<head>
      <link rel="stylesheet" href="pay.css">
</head>
<body>
<header>
        <?php include "menu.php";?>
</header>
<?php 
$stmt = $pdo->prepare("SELECT product.ชื่อสินค้า,product.img,ordering.จำนวน,product.ราคาสินค้า FROM ordering JOIN product ON ordering.รหัสสินค้า=product.รหัสสินค้า JOIN 
`order` ON `order`.เลขออเดอร์=ordering.เลขออเดอร์ WHERE ordering.เลขออเดอร์=?");
$stmt->bindParam(1,$_GET["เลขออเดอร์"]);
$stmt->execute();
?>
<?php
   $numor=$_GET["เลขออเดอร์"];
   while ($row = $stmt->fetch()) { ?>
   <table>
    <tr>
        <td>ภาพสินค้า</td>
        <td>รายการสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
    <tr>
    <tr>
        <td><img width='100px' src='img/<?=$row["img"]?>'><br></td>
        <td><?=$row['ชื่อสินค้า']?><br></td>
        <td><?=$row['จำนวน']?><br></td>
        <td><?=$row['ราคาสินค้า']?><br></td>
   </tr>
<?php } ?>
  </table>
<?php
    $stmt = $pdo->prepare("SELECT รวมจำนวนเงิน FROM `order` WHERE เลขออเดอร์='$numor'");
    $stmt->execute();
    while ($row = $stmt->fetch()) { ?>
          <b>รวม : <?=$row ["รวมจำนวนเงิน"]?> บาท</b>
<?php }
?>      
        <?php $stmt = $pdo->prepare("SELECT * FROM deliverycompany");
        $stmt->execute();?>
       <br>ธนาคาร: ไทยพาณิชย์ (SCB)
       <br>ชื่อ: Samaang_Shop
       <br>เลขบัญชี:775 0787 9777</br>
       <br><div class="col-12">
            <form action='upload.php?เลขออเดอร์=<?=$numor?>' method="POST" enctype="multipart/form-data">
                <div>
                     Upload Slip here<br>
                     <input type="file" name="myimg" required class="upload-box">
                </div>
                <?php
                     if (!empty($_SESSION['show'])): ?>
                        <b><?php echo $_SESSION['show']; ?></b>
                        <?php endif 
                 ?>
                  <p>เลือกบริษัทขนส่ง:</p>
                  <select name="selectid" id="selectid" onclick="transport()">
                  <option value="start">----เลือกบริษัทจัดส่ง----</option>
                  <?php while($row=$stmt->fetch()): ?>
                  <option value="<?=$row["รหัสบริษัท"]?>"><?=$row["บริษัทจัดส่ง"]?></option>
                  <?php endwhile; ?>
                  </select>
                  <div>
                     <input type="submit" name="submit" value="SAVE">
               </div>
        </form>
       <div>
<script>
    fuction transport(){
    
     }
</script>
</body>
</html>










//delivery


<?php  
 $con=mysqli_connect('localhost','root','','shop');   
 $sql=mysqli_query($con,"select send.เลขการจัดส่ง,send.บริษัทจัดส่ง,send.สถานะ,send.เลขออเดอร์,
 `order`.`Slip_img` from send JOIN `order` ON send.เลขออเดอร์=`order`.`เลขออเดอร์`");  
  
 if (isset($_GET['เลขออเดอร์']) && isset($_GET['สถานะ'])) {  
      $เลขออเดอร์=$_GET['เลขออเดอร์'];  
      $สถานะ=$_GET['สถานะ'];  
      mysqli_query($con,"update send set สถานะ='$สถานะ' where เลขออเดอร์='$เลขออเดอร์'");  
      header("location:delivery.php");  
      die();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <link rel="stylesheet" href="style2.css">
 </head>  
 <body> 
 <header>
        <?php include "menu.php";?>
</header>
 <h2>สถานะ Order</h2>
 <nav>
      <table>  
           <tr>  
                <th>เลขออเดอร์</th>
                <th>สลิป</th>
                <th>สถานะปัจจุบัน</th> 
                <th>แก้ไขสถานะ</th>  
           </tr>  
           <?php  
                 while ($row=mysqli_fetch_assoc($sql)) { ?>  
                 <tr>   
                      <td id="colorw"><?php echo $row['เลขออเดอร์'] ?></td>
                      <td><img width='250px' src='slip/<?=$row["Slip_img"]?>'><br></td>
                      <td id="colorwh">  
                           <?php  
                            if ($row['สถานะ']==1) {  
                              echo "เตรียมสินค้า";  
                           }if ($row['สถานะ']==2) {  
                              echo "อยู่ระหว่างการจัดส่ง";  
                           }if ($row['สถานะ']==3) {  
                              echo "จัดส่งสำเร็จ";  
                           }  
                           ?>  
                      </td>  
                      <td>  
                           <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['เลขออเดอร์'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="1">เตรียมสินค้า</option>  
                                <option value="2">อยู่ระหว่างการจัดส่ง</option>  
                                <option value="3">จัดส่งสำเร็จ</option>  
                           </select>  
                      </td>  
                 </tr>       
           <?php      }  
         ?>  
      </table>  
</nav>  
 <script>  
      function status_update(value,เลขออเดอร์){  
           let url = "delivery.php";  
           document.location.href= url+"?เลขออเดอร์="+เลขออเดอร์+"&สถานะ="+value;  
           window.alert(เลขออเดอร์ +" แกัไขสถานะเป็น '"+value+ " ' ");
           
      }  
 </script>  
 </body>  
 </html>  
 
