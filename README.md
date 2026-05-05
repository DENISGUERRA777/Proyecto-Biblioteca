# Proyecto Biblioteca

A command-line library management system written in PHP. It allows library staff to manage books, members, and book loans through an interactive menu.

## Features

- **Search books** by title, category, or author
- **Add and remove books** from the library catalog
- **Add and remove members** from the library registry
- **Create book loans** for registered members
- **Return loans** and update the book's availability status

## Project Structure

```
Proyecto-Biblioteca/
├── index.php          # Entry point and interactive CLI menu
└── clases/
    ├── Biblioteca.php # Core library class managing books, members, and loans
    ├── Libro.php      # Book model (id, title, year, author, status, category)
    ├── Miembro.php    # Member model (id, name, phone)
    └── Prestamo.php   # Loan model (id, member id, book id, finished status)
```

## Classes

### `Biblioteca`
The main class that holds and manages three lists:
- `listaLibros` – the catalog of books
- `listaMiembros` – the registered members
- `listaPrestamos` – the active and past loans

Key methods:
| Method | Description |
|---|---|
| `agregarLibro($libro)` | Adds a book to the catalog |
| `eliminarLibro($id)` | Removes a book by its ID |
| `agregarMiembro($miembro)` | Registers a new member |
| `eliminarMiembro($id)` | Removes a member by their ID |
| `agregarPrestamo($prestamo)` | Records a new loan |
| `buscarPorNombre($nombre)` | Searches books by title |
| `buscarPorCategoria($categoria)` | Searches books by category |
| `buscarPorAutor($autor)` | Searches books by author |
| `buscarPrestamo($id)` | Finds a loan by its ID |
| `buscarMiembro($id)` | Finds a member by their ID |
| `modificarEstadoLibro($id, $estado)` | Updates a book's availability (`true` = on loan, `false` = available) |
| `modificarEstadoPrestamo($id, $finalizado)` | Marks a loan as finished |

### `Libro`
Represents a book with the following attributes: `id`, `titulo` (title), `año` (year), `autor` (author), `estado` (availability status), and `categoria` (category).

### `Miembro`
Represents a library member with: `id`, `nombre` (name), and `telefono` (phone number).

### `Prestamo`
Represents a book loan with: `id`, `idMiembro` (member ID), `idLibro` (book ID), and `finalizado` (whether the loan has been returned).

## Requirements

- PHP 7.0 or higher

## Usage

Run the application from the command line:

```bash
php index.php
```

You will be presented with an interactive menu:

```
---- Proyecto Bibliotech ----
1. Buscar un Libro
2. Agregar un libro
3. Eliminar un libro
4. Agregar a un miembro
5. Eliminar un miembro
6. Devolver prestamo
7. Salir
```

Follow the on-screen prompts to manage the library catalog, members, and loans.
