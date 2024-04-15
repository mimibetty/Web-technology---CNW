<html>
    <head>
        <title> Xóa học sinh </title>
        <meta charset="utf-8">
    </head>
    <body>
        <div style="text-align: center; margin: auto; max-width: 800px;">
        <form action="../Controller/C_Student.php" method="post">
                <br><br>
                <br>

            <h1>Xóa sinh viên: <?php echo "$student->hoten" ?> </h1>

            <table>
                <tr>
                    <td>
                        <label for="">MSSV</label>
                    </td>
                    <td>
                        <?php
                            echo '<input type="text" name="mssv" value="'.$student->mssv.'" readonly>';
                        ?>
                    </td>
                </tr>


                <br>
                <tr>
                    <td>
                        <label for="">Họ và tên</label>
                    </td>
                    <td>
                        <?php
                            echo ' <input type="text" name="hoten" value="'.$student->hoten.'" readonly>';
                        ?>
                    </td>
                </tr>
                
                <br>
                <tr>
                    <td>
                        <label for="gioitinh">Giới tính</label>
                    </td>
                    <td>
                        <input type="radio" id="nam" name="gioitinh" value="1" <?php echo $student->gioitinh == 1 ? 'checked' : ''; ?>>
                        <label for="nam">Nam</label>
                        <input type="radio" id="nu" name="gioitinh" value="0" <?php echo $student->gioitinh == 0 ? 'checked' : ''; ?>>
                        <label for="nu">Nữ</label>
                    </td>
                </tr>

                <br>
                <tr>
                    <td>
                        <label for="">Khoa</label>
                    </td>
                    <td>
                        <?php
                            echo '<input type="text" name="khoa" value=" '.$student->khoa.'" readonly>';
                        ?>
                    </td>
                </tr>
                <br>

            </table>
            <input type="submit" value="Xóa" name="DeleteConfirm" style="float: left;">
        </form>
        <h1> <a href="javascript:history.back()">Quay lại</a> </h1>

    </div>

    </body>
</html>