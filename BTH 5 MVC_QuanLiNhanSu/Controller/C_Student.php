<?php
header('Content-Type: text/html; charset=utf-8');
include_once("../Model/M_Student.php");


$modelStudent = new ModelStudent();
  
if (isset($_POST['Insert'])) {
    // cap nhat 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $university = $_POST['university'];
    // $modelStudent = new EntityStudent($id, $name, $age, $university);
    $ok = $modelStudent->addStudent($id, $name, $age, $university);
    if ($ok) {
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
         include_once("../View/StudentList.php");
    
        // header('Location: http://localhost/MVC_EXAMPLE/Controller/C_Student.php?mod1=view');
    }
    else {
        //  echo "ID exist, can not insert ID:  " . $id;
        // echo '<h1> <a href="javascript:history.back()">Quay lại</a> </h1>';
          
    }

}
else if (isset($_GET['mod5']) && isset($_GET['stid'])) {  // tìm giá trị student rồi fill vào form update
    $stid = $_GET['stid'];
    $modelStudent = new ModelStudent();
    $student = $modelStudent->getStudent($stid);
    include_once("../View/UpdateForm.html");
}
else if (isset($_REQUEST['UpdateDetail']))
{
    $id=$_REQUEST['id'];
    $name=trim($_REQUEST['name']);
    $age=trim($_REQUEST['age']);
    $university=trim($_REQUEST['university']);
    $ok = $modelStudent->updateStudentDetail($id,$name,$age,$university);
    if ($ok) 
    {    
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
        include_once("../View/StudentList.php");
    }
    else 
    {
        echo " can not excute !'";
         echo '<h1> <a href="javascript:history.back()">back</a> </h1>';
    }
    // header('Location:C_Student.php');
}

else if (isset($_GET['mod4']) && isset($_GET['stid'])) { // xu li xóa 
    $stid = $_GET['stid'];     
    $modelStudent = new ModelStudent();
    $ok = $modelStudent->deleteStudent($stid);
    if ($ok) 
    {    
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
        include_once("../View/StudentList.php");
    }
    else 
    {
        echo " can not delete !'";
         echo '<h1> <a href="javascript:history.back()">back</a> </h1>';
    }
}
else if (isset($_POST['SearchFunc'])) { // tim kiem
    $criteria =  $_POST['criteria'];
    $valueSearch = $_POST['valueSearch']; 
    // echo $criteria . $valueSearch;
    if ($criteria != '' && $valueSearch != '') {
            $students = $modelStudent->searchStudent($criteria, $valueSearch);
            
            echo 'Kết quả tìm kiếm cho <code>' . $criteria . "='" . $valueSearch . "'</code> là:";

            include_once("../View/StudentList.php");
    }
    else {
        echo "<Strong> can't found </Strong>";
    }
}
else if (isset($_GET['mod1'])) {
    // view  
    if (isset($_GET['stid'])) {
            $student = $modelStudent->getStudent($_GET['stid']);
            include_once("../View/StudentDetail.php");
        } 
    else {
        $students = $modelStudent->getAllStudent();    
        include_once("../View/StudentList.php");
    }
}
else if (isset($_GET['mod2'])) {
    // search 
    include_once("../View/SearchStudent.php");  
}
else if (isset($_GET['mod3'])) {
    // insert 
    include_once("../View/InsertStudent.php");
}
else if (isset($_GET['mod4'])) {
    // delete
    $students = $modelStudent->getAllStudent();    
    include_once("../View/DeleteStudent.php");  
}
else if (isset($_GET['mod5'])) { // choose update
    $students = $modelStudent->getAllStudent();    
    include_once("../View/UpdateStudent.php");  
}
else {
    echo "LỖI! Tham số <code>mod</code> có giá trị không hợp lệ ư á ệ ửu kí mò chì.";
}

