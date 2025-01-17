<?php
    class Maclasse {

        private $monattribut;

        public function __construct() {
            $this -> monattribut = 2;
        }

        public function Getmonattribut(){
            return $this -> monattribut;
        }

        public function Setmonattribut($value){
            if (($value >= 0) && ($value < 10))
            {
                $this -> monattribut = $value;
            } 
        }
    }
?>