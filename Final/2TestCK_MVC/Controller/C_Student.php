<?php
header('Content-Type: text/html; charset=utf-8');
include_once("../Model/M_Student.php");


$modelStudent = new ModelStudent();
  
if (isset($_POST['Insert'])) {
    // cap nhat 
    $mssv = $_POST['mssv'];
    $hoten = $_POST['hoten'];
    $gioitinh = $_POST['gioitinh'];
    $khoa = $_POST['khoa'];
    // $modelStudent = new EntityStudent($id, $name, $gioitinh, $khoa);
    $ok = $modelStudent->addStudent($mssv, $hoten, $gioitinh, $khoa);
    if ($ok) {
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
        include_once("../View/MainPage.php");    

    
        // header('Location: http://localhost/MVC_EXAMPLE/Controller/C_Student.php?mod1=view');
    }
    else {
        //  echo "ID exist, can not insert ID:  " . $id;
        // echo '<h1> <a href="javascript:history.back()">Quay lại</a> </h1>';
                header('Location: http://localhost/2TestCK_MVC/View/Error.php');

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
    $mssv=$_REQUEST['mssv'];
    $hoten=trim($_REQUEST['hoten']);
    $gioitinh=trim($_REQUEST['gioitinh']);
    $khoa=trim($_REQUEST['khoa']);
    $ok = $modelStudent->updateStudentDetail($mssv,$hoten,$gioitinh,$khoa);
    if ($ok) 
    {    
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
         include_once("../View/MainPage.php");    
    }
    else 
    {
        echo " can not excute !'";
         echo '<h1> <a href="javascript:history.back()">back</a> </h1>';
    }
    // header('Location:C_Student.php');
}
else if (isset($_REQUEST['DeleteConfirm'])) { // xu li xóa 
   
    $stid = $_REQUEST['mssv'];     
    $modelStudent = new ModelStudent();
    $ok = $modelStudent->deleteStudent($stid);
    if ($ok) 
    {    
        echo "Sucess !";
        $students = $modelStudent->getAllStudent();    
         include_once("../View/MainPage.php");    
    }
    else 
    {
        echo " can not delete !'";
         echo '<h1> <a href="javascript:history.back()">back</a> </h1>';
    }
}
else if (isset($_GET['mod4']) && isset($_GET['stid'])) { // xu li xóa 
    $stid = $_GET['stid'];     
    $modelStudent = new ModelStudent();
    $student = $modelStudent->getStudent($stid);    
    include_once("../View/DeleteStudent.php");
    exit;

    // $ok = $modelStudent->deleteStudent($stid);
    // if ($ok) 
    // {    
    //     echo "Sucess !";
    //     $students = $modelStudent->getAllStudent();    
    //      include_once("../View/MainPage.php");    
    // }
    // else 
    // {
    //     echo " can not delete !'";
    //      echo '<h1> <a href="javascript:history.back()">back</a> </h1>';
    // }
}
else if (isset($_POST['SearchFunc'])) { // tim kiem
    $criteria =  $_POST['criteria'];
    $valueSearch = $_POST['valueSearch']; 
    // echo $criteria . $valueSearch;
    if ($criteria != '' && $valueSearch != '') {
            $students = $modelStudent->searchStudent($criteria, $valueSearch);
            
            echo 'Kết quả tìm kiếm cho <code>' . $criteria . "='" . $valueSearch . "'</code> là:";

                     include_once("../View/MainPage.php");    

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
                 include_once("../View/MainPage.php");    

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
    include_once("../View/MainPage.php");  
}
else if (isset($_GET['mod0'])) {
    $students = $modelStudent->getAllStudent();    
    include_once("../View/MainPage.php");
}
else if (isset($_GET['findUni'])) {
    $findUni = $_GET['findUni'];     
   
    $students = $modelStudent->searchStudent("khoa",$findUni);    
    include_once("../View/MainPage.php");    
}
else {
    echo "LỖI! Tham số <code>mod</code> có giá trị không hợp lệ .";
}

