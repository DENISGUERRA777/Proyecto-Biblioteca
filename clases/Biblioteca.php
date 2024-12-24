<?php
    class Biblioteca{
        private $listaLibros;
        private $listaMiembros;
        private $listaPrestamos;

        public function __construct($listaLibros, $listaMiembros, $listaPrestamos)
        {
            $this->listaLibros = $listaLibros;
            $this->listaMiembros = $listaMiembros;
            $this->listaPrestamos = $listaPrestamos;
        }

        //Agergar un libro a la biblioteca
        public function agregarLibro($libro){
            $this->listaLibros[] = $libro;
        }
        //agregar un miembro a la biblioteca
        public function agregarMiembro($miembro){
            $this->listaMiembros[] = $miembro;
        }
        //hacer un prestamo de libro
        public function agregarPrestamo($prestamo){
            $this->listaPrestamos[] = $prestamo;
        }

        //eliminar objetos de las listas
        public function eliminarLibro($id){
            foreach ($this->listaLibros as $key => $libro) 
            { if ($libro->getId() === $id) {
                 unset($this->listaLibros[$key]); 
                    return true;}
            }
        }
        public function eliminarMiembro($id){
            foreach ($this->listaMiembros as $key => $miembro) 
            { if ($miembro->getId() === $id) {
                 unset($this->listaMiembros[$key]); 
                    return true;}
            }
        }
        public function eliminarPrestamo($id){
            foreach ($this->listaPrestamos as $key => $prestamo) 
            { if ($prestamo->getId() === $id) {
                 unset($this->listaPrestamos[$key]); 
                    return true;}
            }
        }

        //busqueda de libros
        public function buscarPorCategoria($categoria){
            return array_filter($this->listaLibros, function($libro) use ($categoria) {
                return $libro->getCategoria() === $categoria;
            });
        }
        public function buscarPorNombre($nombre){
            return array_filter($this->listaLibros, function($libro) use ($nombre) {
                return $libro->getTitulo() === $nombre;
            });
        }
        public function buscarPorAutor($autor){
            return array_filter($this->listaLibros, function($libro) use ($autor) {
                return $libro->getAutor() === $autor;
            });
        }

        //buscar prestamo
        public function buscarPrestamo($id){
            return array_filter($this->listaPrestamos, function($prestamo) use ($id) {
                return $prestamo->getId() === $id;
            });
        }

        //buscar miembro
        public function buscarMiembro($id){
            return array_filter($this->listaMiembros, function($miembro) use ($id) {
                return $miembro->getId() === $id;
            });
        }

        // Método para obtener la cantidad de libros
        public function contarLibros() {
            return count($this->listaLibros);
        }
        // Método para obtener la cantidad de libros
        public function contarMiembros() {
            return count($this->listaMiembros);
        }
        // Método para obtener la cantidad de libros
        public function contarPrestamos() {
            return count($this->listaPrestamos);
        }

        // Método para modificar el estado de un libro
        public function modificarEstadoLibro($indice, $estado) {
            if (isset($this->listaLibros[$indice])) {
                $this->listaLibros[$indice]->setEstado($estado);  
            }
        }
        // Método para modificar el estado de un prestamo
        public function modificarEstadoPrestamo($indice, $finalizado) {
            if (isset($this->listaPrestamos[$indice])) {
                $this->listaPrestamos[$indice]->setFinalizado($finalizado);  
            }
        }
    }
?>