<?php
require "./dbConnect.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $department = $_POST['department'];
    $hostel = $_POST['hostel'];


    $sql_search = "SELECT * FROM `assaignment_01_db`.`students` WHERE `roll_number` = '$roll_number'";
    $result_search = mysqli_query($connect,$sql_search);

    $num_of_rows = mysqli_num_rows($result_search);
    
    if($num_of_rows <= 0)
    {   // ADDING NEW STUDENT
        $sql_insert = "INSERT INTO `assaignment_01_db`.`students`(`name`,`roll_number`,`department`,`hostel`) VALUES ('$name','$roll_number','$department','$hostel')";

        $result_insert = mysqli_query($connect,$sql_insert);
        header("location:index.php?q=SUCCESSFULLY Regestered !!");
    }
    else if($num_of_rows = 1)
    {   // SENDING AN ALERT IF A STUDENT ALREDY EXISTS
        header("location:index.php?q=Student Alredy Exists !!");
    }
}


?>