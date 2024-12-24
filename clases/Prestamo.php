<?php
    class Prestamo{
        private $id;
        private $idMiembro;
        private $idLibro;
        private $finalizado;

        public function __construct($id, $idMiembro, $idLibro, $finalizado)
        {
            $this->id = $id;
            $this->idMiembro = $idMiembro;
            $this->idLibro = $idLibro;
            $this->finalizado = $finalizado;
        }

        /**
        * Get the value of id
        */ 
        public function getId(){
            return $this->id;
        }

        /**
        * Get the value of idMiembro
        */ 
        public function getIdMiembro(){
            return $this->idMiembro;
        }
        /**
         * Set the value of idMiembro
         *
         * @return  self
         */ 
        public function setIdMiembro($idMiembro)
        {
                $this->idMiembro = $idMiembro;

                return $this;
        }

        /**
        * Get the value of idLibro
        */ 
        public function getIdLibro(){
            return $this->idLibro;
        }
        /**
         * Set the value of idLibro
         *
         * @return  self
         */ 
        public function setIdLibro($idLibro)
        {
                $this->idLibro = $idLibro;

                return $this;
        }

        /**
        * Get the value of idLibro
        */ 
        public function getFinalizado(){
            return $this->finalizado;
        }
        /**
         * Set the value of idLibro
         *
         * @return  self
         */ 
        public function setFinalizado($finalizado)
        {
                $this->finalizado = $finalizado;

                return $this;
        }
    }
?>