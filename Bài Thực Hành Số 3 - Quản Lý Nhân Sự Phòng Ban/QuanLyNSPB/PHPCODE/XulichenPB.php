<head>
    <meta charset="utf-8"/>
</head>

<?php     
    $idpb = $_POST['idpb'];
    $tenpb = $_POST['tenpb'];
    $mota = $_POST['mota'];

    $conn = mysqli_connect("localhost", "root", "", "DULIEU") or die("game over");
    echo "<br>";
    // kiem tra khoa chinh co ton tai hay khong (idpb)
    $query1 = "SELECT * FROM " . "phongban" . " WHERE "."idpb". " = '" . $_POST['idpb'] . "';";
    $result = mysqli_query($conn, $query1);



    // // // Đếm số lượng bản ghi
    $num_rows = mysqli_num_rows($result);
    // echo $num_rows;
    if ($num_rows == 0) {
        $insert_query = "INSERT INTO phongban (IDPB, Tenpb, Mota) VALUES ('$idpb', '$tenpb', '$mota')";
        $result = mysqli_query($conn, $insert_query);
        echo "them thanh cong";

        header('Location: xemThongTinPB.php');

    }
    else {
        echo "da ton tai idpb, them that bai";
        echo "<br>";
        echo "<br>";
        
        echo '<a href="javascript:history.back()">Back</a>';

    }   

?>
