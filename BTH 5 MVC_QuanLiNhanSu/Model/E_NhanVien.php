<?php
    class Entity_NhanVien
    {
        public $id;
        public $name;
        public $idpb;
        public $address;
        
        public function __construct($_id, $_name, $_idpb, $_address)
        {
            $this->id = $_id;
            $this->name = $_name;
            $this->idpb = $_idpb;
            $this->address = $_address;
        }
    }
?>