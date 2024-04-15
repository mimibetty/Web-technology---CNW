<?php
    class Entity_PhongBan
    {
        public $id;
        public $name;
        public $mota;
        
        public function __construct($_id, $_name, $_mota)
        {
            $this->id = $_id;
            $this->name = $_name;
            $this->mota = $_mota;
        }
    }
?>