<?php
namespace App\DAO\impl;
 
use App\DTO\impl\LibroDTO;
use App\DAO\ILibrosDAO;
use Exception;

class LibrosJSONDAO implements ILibrosDAO {

    public $items;
    function __construct(){
        $data = @file_get_contents(BASE_DIR .'/src/data/libros.json');
        $this -> items = json_decode($data, true);
    }
    /**
     *
     * @param LibroDTO $libro
     *
     * @return bool
     */
    function create(LibroDTO $libro): bool {
        $data = @file_get_contents(BASE_DIR .'/src/data/libros.json');
        $libros = json_decode($data, true);
        array_push($libros,$libro);
        return file_put_contents(base_path() .'/src/data/libros.json',json_encode($libros,JSON_PRETTY_PRINT));
    }
     
    /**
     *
     * @return array
     */
    function read($limit): array {
        return $this -> items;
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
        $data = @file_get_contents(BASE_DIR .'/src/data/libros.json');
        $libros = json_decode($data, true);
        foreach ($libros as $libro) {
            if($libro['id']==$id){
                $resultado=new LibroDTO($libro['id'],$libro['titulo'],$libro['anyo'],$libro['duracion']);
            }
        }
        $resultado==null ? throw new Exception("El recurso no se ha encontrado") : "";
        return $resultado;
    }
     
    /**
     *
     * @param int $id
     * @param LibroDTO $libro
     *
     * @return bool
     */
    function update(int $id, LibroDTO $libro): bool {
        $data = @file_get_contents(BASE_DIR .'/src/data/libros.json');
        $libros = json_decode($data, true);
        $libros[$id]=$libro;
        file_put_contents(base_path() .'/src/data/libros.json',json_encode([]));
        return file_put_contents(base_path() .'/src/data/libros.json',$libros);
    }
     
    /**
     *
     * @param int $id
     *
     * @return bool
     */
    function delete(int $id): bool {
        $data = @file_get_contents(BASE_DIR .'/src/data/libros.json');
        $libros = json_decode($data, true);
        file_put_contents(base_path() .'/src/data/libros.json',json_encode([]));
        unset($libros[$id]);
        return file_put_contents(base_path() .'/src/data/libros.json',$libros);
    }
}