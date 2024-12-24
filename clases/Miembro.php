<?php
    class Miembro{
        private $id;
        private $nombre;
        private $telefono;

        public function __construct($id, $nombre, $telefono)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
        }

        /**
        * Get the value of id
        */ 
        public function getId(){
            return $this->id;
        }

        /**
        * Get the value of nombre
        */ 
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
        * Get the value of telefono
        */ 
        public function getTelefono(){
            return $this->telefono;
        }
        /**
         * Set the value of telefono
         *
         * @return  self
         */ 
        public function setTelefono($telefono)
        {
                $this->telefono = $telefono;

                return $this;
        }
    }
?>