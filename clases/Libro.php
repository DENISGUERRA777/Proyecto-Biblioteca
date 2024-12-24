<?php
    class Libro{
        private $id;
        private $titulo;
        private $año;
        private $autor;
        private $estado;
        private $categoria;

        public function __construct($id, $titulo, $año, $autor, $estado, $categoria)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->año = $año;
            $this->autor = $autor;
            $this->estado = $estado;
            $this->categoria = $categoria;
        }

        /**
        * Get the value of id
        */ 
        public function getId(){
            return $this->id;
        }

        /**
        * Get the value of titulo
        */ 
        public function getTitulo(){
            return $this->titulo;
        }
        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
        * Get the value of año
        */ 
        public function getAño(){
            return $this->año;
        }
         /**
         * Set the value of año
         *
         * @return  self
         */ 
        public function setAño($año)
        {
                $this->año = $año;

                return $this;
        }

        /**
        * Get the value of Autor
        */ 
        public function getAutor(){
            return $this->autor;
        }
         /**
         * Set the value of autor
         *
         * @return  self
         */ 
        public function setAutor($autor)
        {
                $this->autor = $autor;

                return $this;
        }

        /**
        * Get the value of estado
        */ 
        public function getEstado(){
            return $this->estado;
        }
         /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
        * Get the value of categoria
        */ 
        public function getCategoria(){
            return $this->categoria;
        }
         /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }
    }

    

?>