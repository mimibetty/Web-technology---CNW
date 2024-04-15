<?php
class EntityStudent {
    public $mssv, $hoten, $gioitinh, $khoa;

    public function __construct($i, $n, $a, $u) {
        $this->mssv = $i;
        $this->hoten = $n;
        $this->gioitinh = $a;
        $this->khoa = $u;
    }
}
?>