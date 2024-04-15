<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    $department = $_REQUEST['department'];

    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");

    mysqli_select_db($link, "dulieu");

    $sql = "SELECT * FROM phongban WHERE IDPB='$department'";

    $rs = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($rs);
        $IDPB = $row[0];
        $TenPB = $row[1];
        $MotaPB = $row[2];
    

    mysqli_close($link);
    ?>
    <center>
    <form action="xulicapnhatphongban.php" method="POST">
        <table>
            <tr>
                <td>ID Phòng ban: </td>
                <td><input type="text" name="IDPB" value="<?php echo $IDPB ?>" readonly></td>
            </tr>
            <tr>
                <td>Tên phòng ban: </td>
                <td><input type="text" name="TenPB" value="<?php echo $TenPB ?>"></td>
            </tr>
            <tr>
                <td>Mô tả: </td>
                <td><input type="text" name="MotaPB" value="<?php echo $MotaPB ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Cập nhật">
    </form>
</center>
</body>
</html>