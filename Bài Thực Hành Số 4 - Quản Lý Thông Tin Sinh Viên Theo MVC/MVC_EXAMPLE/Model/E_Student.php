<?php
class EntityStudent {
    public $id, $name, $age, $university;

    public function __construct($i, $n, $a, $u) {
        $this->id = $i;
        $this->name = $n;
        $this->age = $a;
        $this->university = $u;
    }
}
?>