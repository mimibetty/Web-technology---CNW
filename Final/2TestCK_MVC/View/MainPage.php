
<html>
    <head>
        <title> Xem danh sách học sinh </title>
        <meta charset="utf-8">
        <style type="text/css">
            .btn {
                display: inline-block;
                padding: 10px 20px;
                color: white;
                text-decoration: none;
                background-color: darkgoldenrod;
                border-radius: 2px;
                margin: 2px;
            }

.btn:hover {
    background-color: darkblue;
}
        </style>
    </head>
    <body>
        <?php
        session_start(); // Khởi tạo session
        if (isset($_SESSION['yourAccount'])) {
            echo '<h1>Welcome my friend, ' . $_SESSION['yourAccount'] . '</h1>';
        }

        ?>

        <div style="text-align: center; margin: auto; max-width: 800px;">
            <!-- <h2> Danh sách học sinh <h2> -->
            


          <!--   <form action="" method="get">
                <select name="aa">
                    <option value="bk">bk</option>
                    <option value="sunano1">sunano1</option>
                    <option value="cc">cc</option>
                </select>
                <input type="submit" value="Search">
            </form>
 -->
            <?php
                $object = new ModelStudent();
                $universities = $object->getAllStudentAtKhoa();
            ?>

            <form action="" method="get">
                <select name="findUni">
                    <?php foreach ($universities as $university): ?>
                        <option value="<?= $university ?>"><?= $university ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Search">
            </form>

<a href='C_Student.php?mod3=insert' style='float: right;position: relative; top: -10px;' class='btn'> Thêm sinh viên </a>            
            <!-- <a href='C_Student.php?mod3=insert' style='position: relative; top: -10px;'> Thêm sinh viên </a> -->

            <table border = "2" width = 100%>
                <tr>
                    <th>MSSV</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Khoa</th>
                    <th>Trang cá nhân</th>
                </tr>
            <?php
                for ($i = 0; array_key_exists($i, $students); $i++) {
                    echo "<tr>";
                    echo "<td>" . $students[$i]->mssv . "</td>";
                    echo "<td>" . $students[$i]->hoten . "</td>";
                    // echo "<td>" . $students[$i]->gioitinh . "</td>";
             
                    echo "<td>";
                        if ($students[$i]->gioitinh) {
                            echo "Nam";
                        } 
                        else {
                            echo "Nữ";
                        }
                    echo "</td>";
             
                    echo "<td>" . $students[$i]->khoa . "</td>";
                    
                    echo "<td>";
                    // echo "<a href='?mod1=view&stid=".$students[$i]->id."'> Link </a>";
                    // echo "<a href='?mod5=update&stid=".$students[$i]->id."'> Cập nhật </a>";
                    // echo "<a href='?mod4=delete&stid=".$students[$i]->id."'> Xóa </a>";

                    echo "<a href='?mod1=view&stid=".$students[$i]->mssv."' class='btn'>Xem</a>";
                    echo "<a href='?mod5=update&stid=".$students[$i]->mssv."' class='btn'>Cập nhật</a>";
                    // echo "<a href='?mod4=delete"."' class='btn'>Xóa</a>";
                    
                    echo "<a href='?mod4=delete&stid=".$students[$i]->mssv."' class='btn'>Xóa</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            ?>
            </table>
        </div>
        <hr>
        <h1> <a href="javascript:history.back()">Back</a> </h1>
    </body>
</html>