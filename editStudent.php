<?php
require "./dbConnect.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $srno = $_POST['srno'];
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $department = $_POST['department'];
    $hostel = $_POST['hostel'];
    
    // UPDATING STUDENT INFO
    $sql_insert = "UPDATE `assaignment_01_db`.`students` SET `name`='$name',`roll_number`='$roll_number',`department`='$department',`hostel`='$hostel'  WHERE `Sr.no.` = '$srno'";

    $result_insert = mysqli_query($connect,$sql_insert);
    header("location:index.php?q=Edited SUCCESSFULLY !!");
}


?>