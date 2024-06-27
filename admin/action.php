<?php

session_start();
include "config/conn.php";

if(isset($_POST['addproduct'])){
$name = $_POST['name'];
$comment = $_POST['comment'];
$price = $_POST['price'];
$image = $_POST['image'];
$description = $_POST['description'];
$id = $_POST['editId'];


if($_FILES["image"]["tmp_name"]!=""){
    $rt=mt_rand().strtotime(date("YMDHis")); 
    $companyLogoFileName=basename($_FILES['image']['name']); 
    $companyLogoFileExtension=pathinfo($companyLogoFileName, PATHINFO_EXTENSION); 
    $inclusionsImg=time().$rt.'.'.$companyLogoFileExtension;  
    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/{$inclusionsImg}");
    }
     
    if($inclusionsImg==''){ 
    $inclusionsImg=trim($_POST['oldImage']); 
    }


    if ($_POST['editId']!=''){
        $sql = "UPDATE featuredproducts
                SET name = '{$name}', comment = '{$comment}', price = '{$price}', image = '{$inclusionsImg}', description='{$description}'
                WHERE id = {$id}";
    }else{
        $sql = "INSERT into featuredproducts(name, comment, price, image, description) values ('{$name}', '{$comment}','{$price}','{$inclusionsImg}','{$description}')";
    }
        



$query_run=mysqli_query($conn,$sql);

if($query_run){




    $_SESSION['status'] = "Image Stored Successfully";
    header('Location:product.php');

}else{
    $_SESSION['status'] = "image not inserted.!";
    header("Location:product.php");
}
}

if($_REQUEST['deleteId']!=''){
?>
<script>alert('<?php echo $_REQUEST['deleteId'];?>')</script>
<?php
$sql="delete from featuredproducts where id={$_REQUEST['deleteId']}";
$query_run=mysqli_query($conn,$sql);
header('Location:product.php');
}



?>