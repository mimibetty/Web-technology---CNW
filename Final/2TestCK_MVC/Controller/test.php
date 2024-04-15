<?php
    // Include class definition
include_once("../Model/M_Student.php");


    // Create a new object
    $obj = new ModelStudent();

    // Get the data from the function
    $students = $obj->getAllUniversity();

    // print the data
    echo "<pre>";
    print_r($students);
    echo "</pre>";
?>