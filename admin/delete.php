<?php
    include ("./config.php");
    
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['pid'])){
        $pid = intval($_GET['pid']);
    }
    $sql = "Delete from tbl_tourpackages where PackageId=$pid";
    $query = mysqli_query($connect, $sql);
    header("location: manage-category.php");
    mysqli_close($connect);
?>

