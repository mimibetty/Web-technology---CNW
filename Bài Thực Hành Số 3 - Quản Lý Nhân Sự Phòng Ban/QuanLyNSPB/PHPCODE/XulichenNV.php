<head>
    <meta charset="utf-8"/>
</head>

<?php     
    $idnv = $_POST['idnv'];
    $hoten = $_POST['hoten'];
    $idpb = $_POST['idpb'];
    $diachi = $_POST['diachi'];
    
    $conn = mysqli_connect("localhost", "root", "", "DULIEU") or die("game over");
    echo "<br>";
    // kiem tra khoa chinh co ton tai hay khong (idpb)
    $query1 = "SELECT * FROM " . "nhanvien" . " WHERE "."IDNV". " = '" . $_POST['idnv'] . "';";
    $result = mysqli_query($conn, $query1);



    // // // Đếm số lượng bản ghi
    $num_rows = mysqli_num_rows($result);
    // echo $num_rows;
    if ($num_rows == 0) {
        $insert_query = "INSERT INTO nhanvien (IDNV, Hoten, IDPB, Diachi) VALUES ('$idnv', '$hoten', '$idpb', '$diachi')";
        $result = mysqli_query($conn, $insert_query);
        echo "them thanh cong";
        header('Location: xemThongTinNV.php');
    }
    else {
        echo "da ton tai idnv, them that bai";
        echo "<br>";
        echo "<br>";
        echo '<a href="javascript:history.back()">Back</a>';

    }   

?>
