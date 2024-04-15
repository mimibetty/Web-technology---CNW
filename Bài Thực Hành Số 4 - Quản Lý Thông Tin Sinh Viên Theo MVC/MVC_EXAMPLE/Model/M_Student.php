<?php
include_once('E_Student.php');

class ModelStudent {
    public function __construct() {}

    public function getAllStudent() {
        $conn = mysqli_connect("localhost", "root", "", "dulieu") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "SELECT * FROM sinhvien;";

        $rs = mysqli_query($conn, $sql);

        $students = array();
        $entry = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $entity = new EntityStudent($row['id'], $row['name'], $row['age'], $row['university']);

            $students[$entry] = $entity;
            $students[$entity->id] = $entity;
            $entry++;
        }
        return $students;
    }

    public function getStudent($stid) {
        $all = $this->getAllStudent();
        return $all[$stid];
    }

    public function searchStudent($criteria, $searchFor) {
        $all = $this->getAllStudent();
        $found = array();
        for ($i = 0; array_key_exists($i, $all); $i++) {
            if ($all[$i]->$criteria == $searchFor) array_push($found, $all[$i]);
        }
        return $found;
    }
   public function addStudent($id, $name, $age, $university)
    {
        $conn = mysqli_connect("localhost", "root", "", "dulieu") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "select * from sinhvien WHERE ID = '". $id . "';";
        $rs = mysqli_query($conn, $sql);

        // Đếm số lượng bản ghi
        $num_rows = mysqli_num_rows($rs);
        if ($num_rows == 0) {
            // Chèn thêm
            $sql = "insert into sinhvien(id, name, age, university) values ('$id', '$name', '$age', '$university')";
            $rs = mysqli_query($conn, $sql);
            
            if ($rs) {
                // Nếu truy vấn thành công, trả về 1
                return 1;
            } else {
                // Nếu truy vấn thất bại, trả về 0
                return 0;
            }

        } 
        else {
            echo "ID exist, can not insert ID:  " . $id;
            echo '<h1> <a href="javascript:history.back()">Quay lại</a> </h1>';
            // Nếu ID đã tồn tại, trả về 0
            return 0;
        }
    }

     public function deleteStudent($id)
    {
        $conn = mysqli_connect("localhost", "root", "", "dulieu") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "DELETE FROM sinhvien WHERE id = '$id'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    public function updateStudentDetail($id, $name, $age, $university)
    {
        $conn = mysqli_connect("localhost", "root", "", "dulieu") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "update sinhvien set name = '$name', age = '$age', university = '$university' where id=$id";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

}
?>