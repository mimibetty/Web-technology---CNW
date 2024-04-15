<?php
include_once('E_Student.php');

class ModelStudent {
    public function __construct() {}

    public function getAllStudent() {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "SELECT * FROM sinhvien;";

        $rs = mysqli_query($conn, $sql);

        $students = array();
        $entry = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $entity = new EntityStudent($row['mssv'], $row['hoten'], $row['gioitinh'], $row['khoa']);

            $students[$entry] = $entity;
            $students[$entity->mssv] = $entity;
            $entry++;
        }
        return $students;
    }   

    public function getStudent($stid) {
        $all = $this->getAllStudent();
        return $all[$stid];
    }

   public function getAllStudentAtKhoa() {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "SELECT DISTINCT khoa FROM sinhvien;";
        
        $rs = mysqli_query($conn, $sql);
        
        $khoa = array();
        while ($row = mysqli_fetch_array($rs)) {
            array_push($khoa, $row['khoa']);
        }
        return $khoa;
    }

    public function searchStudent($criteria, $searchFor) {
        $all = $this->getAllStudent();
        $found = array();
        for ($i = 0; array_key_exists($i, $all); $i++) {
            if ($all[$i]->$criteria == $searchFor) array_push($found, $all[$i]);
        }
        return $found;
    }
   public function addStudent($_mssv, $_hoten, $_gioitinh, $_khoa)
    {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "select * from sinhvien WHERE mssv = '". $_mssv . "';";
        $rs = mysqli_query($conn, $sql);

        // Đếm số lượng bản ghi
        $num_rows = mysqli_num_rows($rs);
        if ($num_rows == 0) {
            // Chèn thêm
            $sql = "insert into sinhvien(mssv, hoten, gioitinh, khoa) values ('$_mssv', '$_hoten', '$_gioitinh', '$_khoa')";
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
            echo "ID exist, can not insert ID:  " . $_mssv;
            echo '<h1> <a href="javascript:history.back()">Quay lại</a> </h1>';
            // Nếu ID đã tồn tại, trả về 0
            return 0;
        }
    }

     public function deleteStudent($id)
    {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "DELETE FROM sinhvien WHERE mssv = '$id'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    public function updateStudentDetail($_mssv, $_hoten, $_gioitinh, $_khoa)
    {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "update sinhvien set hoten = '$_hoten', gioitinh = '$_gioitinh', khoa = '$_khoa' where mssv=$_mssv";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

}
?>