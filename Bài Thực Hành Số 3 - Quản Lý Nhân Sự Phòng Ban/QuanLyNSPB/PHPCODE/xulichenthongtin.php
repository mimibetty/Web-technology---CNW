<head>
    <meta charset="utf-16">
</head>

<?php
    // Tao SQL Query tu thong tin $_REQUEST 
    $ALL_COLS = array(
        "admin" => array("username", "password"),
        "nhanvien" => array("IDNV", "Hoten", "IDPB", "Diachi"),
        "phongban" => array("IDPB", "Tenpb", "Mota")
    );
    $tb = $_REQUEST['table'];
    $cols = $ALL_COLS[$tb];

    $queryInsert = "INSERT INTO $tb VALUES (";
    for ($i = 0; $i < count($cols); $i++) {
        if ($i > 0) $queryInsert .= ", ";
        $queryInsert .= "'".$_REQUEST[$cols[$i]]."'";
    }
    $queryInsert .= ");";

    // echo "SQL Query: <code>" . $query . "</code>";



    // $conn = mysqli_connect("localhost", "root", "", "DULIEU");
    // $result = mysqli_query($conn, $query);

    // echo "<br>";
    // if (mysqli_affected_rows($conn) == -1) {
    //     echo "SQL Error: " . mysqli_error($conn);
    // } else {
    //     echo "Đã thay đổi " . mysqli_affected_rows($conn) . " hàng.";
    // }


//         $IDPBValue = "XCC";

// // Đếm số lượng bản ghi có IDPB bằng 1
// $query1 = "SELECT COUNT(*) as count FROM phongban WHERE IDPB = ?";

// $stmt = mysqli_prepare($conn, $query1);

// mysqli_stmt_bind_param($stmt, 'i', $IDPBValue);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_assoc($result);

// // In ra số lượng bản ghi
// echo "Số lượng bản ghi có IDPB bằng 1: " . $row['count'];
//     // Thuc thi SQL Query


$conn = mysqli_connect("localhost", "root", "", "DULIEU") or die("game over");

$key =  $_REQUEST[$cols[0]];
$query1 = "SELECT * FROM " .$tb . " WHERE ".$ALL_COLS["$tb"][0]. " = '" ."$key" . "';";
$result = mysqli_query($conn, $query1);

// // Đếm số lượng bản ghi
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
    $result = mysqli_query($conn, $queryInsert);
    if (mysqli_affected_rows($conn) == -1) {
        echo "SQL Error: " . mysqli_error($conn);
    } else {
        echo "Đã thay đổi " . mysqli_affected_rows($conn) . " hàng.";
    }
}
else {
    echo '<script type="text/javascript">alert("Không thể thêm vì trùng khóa chính");</script>';

}
// // $stmt = mysqli_prepare($link, $query);
// // mysqli_stmt_bind_param($stmt, 'i', $IDPBValue);
// // mysqli_stmt_execute($stmt);
// // $result = mysqli_stmt_get_result($stmt);

// // In ra các bản ghi
// while ($row = mysqli_fetch_assoc($result)) {
//     echo "IDPB: " . $row['IDPB'] . ", ";
//     // Thêm các cột khác tùy thuộc vào cấu trúc bảng của bạn
//     echo "\n";
// }
?>