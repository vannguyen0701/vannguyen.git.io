<?php 
    $id=$_GET['id'];
    $del="DELETE FROM hanghoa WHERE MSHH='$id'";
    $rs=mysqli_query($conn,$del);
    header("location: index.php");

?>