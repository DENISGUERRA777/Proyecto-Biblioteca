<?php
    require_once './clases/Biblioteca.php';
    require_once './clases/Libro.php';
    require_once './clases/Miembro.php';
    require_once './clases/Prestamo.php';

    function displayMenu(){
        echo "---- Proyecto Bibliotech ---- \n";
        echo "1. Buscar un Libro \n";
        
        echo "2. Agregar un libro \n";
        echo "3. Eliminar un libro \n";
        echo "4. Agregar a un miembro \n";
        echo "5. Eliminar un miembro \n";
        echo "6. Devolver prestamo \n";
        echo "7. Salir \n";
        echo "Seleccione una opcion: ";
    }
    
    //funcion para capturar lo que escriba el ususario 
    function prompt($mensaje){
        echo $mensaje;
        $input = trim(fgets(STDIN));
        return $input;
    }

    // Función para mostrar resultados
    // y hacer un prestamo si es el caso
    function mostrarResultado($resultado, $biblioteca) {
        if (empty($resultado)) {
            echo "No se encontraron resultados.\n";
        } else {
            print_r($resultado);
            //pregunta si se desea hacer un prestamo
            $pregunta = prompt("Prestar libro: \n 1.si 2.no");
            //crea un objeto prestamo y lo agrega a la lista
            if($pregunta == 1){
                $id = $biblioteca->contarPrestamos() +1;
                $idMiembro = prompt("Ingrese el id de miembro:\n");
                $miembro = $biblioteca->buscarMiembro($id);
                print_r($miembro);
                
                
                while($miembro === null || empty($miembro)){
                    $idMiembro = prompt("Ingrese el id de miembro valido o presiona x para salir:\n");
                    if($idMiembro == "x"){echo "Has decidido salir.\n";
                        break;}
                }
                $miembroId = $miembro[0];
                $libro = $resultado[0];
                $idLibro = $libro->getId();
                $finalizado = false;
                $prestamo = new Prestamo($id, $idMiembro, $idLibro, $finalizado);
                $biblioteca->agregarPrestamo($prestamo);
                //cambia el estado del libro
                $biblioteca->modificarEstadoLibro($idLibro, true);
                $prestamos = $biblioteca->buscarPrestamo($id);
                print_r($prestamos) ;
                echo "Prestamo agregado\n";
                echo "Id de prestamo:\n";
                echo $id;
            }
        }
    }
    //instanciamos nuestra biblioteca
    $biblioteca = new Biblioteca([],[],[]);

    //llamaos la funcion display y desplegamos el menu
    $flag = true;
    while($flag){
        displayMenu();
       $opcion = prompt("");
        switch($opcion){
            case 1: 
                //mostramos la opciones de busqueda
                echo "1. Buscar titulo \n";
                echo "2. Buscar por categoria \n";
                echo "3. Buscar por autor \n";
                echo "4. Salir \n";
                echo "Seleccione una opcion: ";
                //busca el resultado y lo muestra 
                switch(prompt("")){
                    case 1:
                        $titulo = prompt("Ingrese el titulo del libro:\n");
                        $resultado = $biblioteca->buscarPorNombre($titulo);
                        mostrarResultado($resultado,$biblioteca);
                        break;
                    case 2:
                        $categoria = prompt("Ingrese la categoria del libro:\n");
                        $resultado = $biblioteca->buscarPorCategoria($categoria);
                        mostrarResultado($resultado, $biblioteca);
                        break;
                    case 3:
                        $autor = prompt("Ingrese Autor del libro:\n");
                        $resultado = $biblioteca->buscarPorAutor($autor);
                        mostrarResultado($resultado, $biblioteca);
                        break;
                    case 4:
                        echo "Estas saliendo ... \n";
                        $flag = false;
                        break;  
                }
                break;
            case 2: 
                //pedimos los datos del libro lo creamos y lo agregamos a la lista
                echo "Ingresa un nuevo libro\n";
                $id = $biblioteca->contarLibros() +1;
                $titulo = prompt("Ingrese el titulo del libro:\n");
                $año = prompt("Ingrese año:\n");
                $autor = prompt("Ingrese autor:\n");
                $estado = false;
                $categoria =prompt("Ingrese categoria:\n");
                $libro = new Libro($id, $titulo, $año, $autor, $estado, $categoria);
                $biblioteca->agregarLibro($libro);

                break;
            case 3:
                //eliminamos un libro de la lista
                $id = intval(prompt("Ingresa el id del libro que deseas eliminar:\n"));
                $biblioteca->eliminarLibro($id);
                echo "Libro eliminado\n";
                break;
            case 4:
                //Pedimos los datos del nuevo miembro creaos el objeto y lo agregamos a la lista
                echo "Ingresa un nuevo miembro\n";
                $id = $biblioteca->contarMiembros() + 1;
                $nombre = prompt("Ingresa el nombre del nuevo miembro:\n");
                $telefono = prompt("Ingresa un numero de contacto: \n");
                $miembro = new Miembro($id, $nombre, $telefono);
                $biblioteca->agregarMiembro($miembro);
                break;
            case 5: 
                //eliminamos un miembro de la lista
                $id = intval(prompt("Ingresa el id del miembro que deseas eliminar:\n"));
                $biblioteca->eliminarMiembro($id);
                echo "Miembro eliminado\n";
                break;
            case 6:
                //pide el id del prestamo y cambia el estado del prestamo a finalizado y el esado del libro 
                $id = intval(prompt("Ingresa el id del préstamo:\n"));
                $prestamos = $biblioteca->buscarPrestamo($id);
                while($prestamos === null || empty($prestamos)){
                    $id = intval(prompt("El id no es valido\n Ingresa el id del prestamo o presiona x para salir:\n"));
                    if($id == "0")
                    {echo "Has decidido salir.\n";
                        break;}
                }
                print_r($prestamos);
                $prestamo = $prestamos[0];
                $biblioteca->modificarEstadoPrestamo($id,true);
                $biblioteca->modificarEstadoLibro($prestamo->getIdLibro(), false);
                echo "Tramite realizado con exito \n";
                break;
            case 7:
                echo "Estas saliendo ... \n";
                $flag = false;
                break;
            default: 
            echo "Seleccione una opcion valida \n";
            break;

        }


    }

?>