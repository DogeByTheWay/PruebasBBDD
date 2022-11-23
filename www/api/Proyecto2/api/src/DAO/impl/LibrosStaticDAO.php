<?php
namespace App\DAO\impl;
 
use App\DTO\impl\LibroDTO;
use App\DAO\ILibrosDAO;
use Exception;

class LibrosStaticDAO implements ILibrosDAO {

    private $libros = [
        array(
            "id" => 1,
            "titulo" => "El padrino",
            "anyo" => 1972,
            "duracion" => 175
        ) ,
        array(
            "id" => 2,
            "titulo" => "El padrino 2",
            "anyo" => 1974,
            "duracion" => 200
        ) ,
        array(
            "id" => 3,
            "titulo" => "Senderos de gloria",
            "anyo" => 1957,
            "duracion" => 86
        ) ,
        array(
            "id" => 4,
            "titulo" => "Primera plana",
            "anyo" => 1974,
            "duracion" => 105
        )
    ];
 
 
    /**
     *
     * @param LibroDTO $libro
     *
     * @return bool
     */
    function create(LibroDTO $libro): bool {
        return array_push($result,$libro);
    }
     
    /**
     *
     * @return array
     */
    function read(): array {
        $result = array();
        
        foreach ($this->libros as $libro) {
            array_push($result, new LibroDTO(
                                        $libro['id'], 
                                        $libro['titulo'], 
                                        $libro['anyo'], 
                                        $libro['duracion']
                                )
            );
        }
 
        return $result;
    }
     
    /**
     *
     * @param int $id
     *
     * @return LibroDTO
     */
    function findById(int $id): LibroDTO {
        //@TODO
        $resultado=null;
        foreach ($this->libros as $libro) {
            if($libro['id']==$id){
                $resultado=new LibroDTO($libro['id'],$libro['titulo'],$libro['anyo'],$libro['duracion']);
            }
        }
        $resultado==null ? throw new Exception("El recurso no se ha encontrado") : "";
        return $resultado;
    }

    function readJson() : array{
        $data = @file_get_contents(BASE_DIR .'/src/data/peliculas.json');
        $items = json_decode($data, true);
        return $items;
    }
     
    /**
     *
     * @param int $id
     * @param LibroDTO $libro
     *
     * @return bool
     */
    function update(int $id, LibroDTO $libro): bool {
        return false;
    }
     
    /**
     *
     * @param int $id
     *
     * @return bool
     */
    function delete(int $id): bool {
        return false;
    }
}