<?php
require "./dbConnect.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $row_num = $_GET['n'];

    // DELETING THE STUDENT FROM THE DATABASE
    $sql_search = "DELETE FROM `assaignment_01_db`.`students` WHERE `Sr.no.` = '$row_num'";
    $result_search = mysqli_query($connect,$sql_search);

    header("location:index.php?q=DELETED successfully !!");

}
?>