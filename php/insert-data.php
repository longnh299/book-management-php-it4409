<?php 

include "connection.php";

session_start();
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $publisher=$_POST["publisher"];
    $price=$_POST["price"];

    $sql="INSERT INTO books (id,name,publisher,price) VALUES ({$id},'{$name}','{$publisher}',{$price})";
    $run_sql=mysqli_query($conn,$sql);

    if($run_sql){
        $_SESSION["success"]="Data Add Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Add Successfully";
        header("location:../add-data.php");
    }

}


?>