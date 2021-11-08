<?php 

include "connection.php";
session_start();
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $publisher=$_POST["publisher"];
    $price=$_POST["price"];

    $sql="UPDATE books SET name='{$name}',publisher='{$publisher}',price={$price} WHERE id={$id}";

    $run_sql=mysqli_query($conn,$sql);
    if($run_sql){
        $_SESSION["success"]="Data Update Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Update Successfully";
        header("location:../edit-data.php");

    }
}


?>