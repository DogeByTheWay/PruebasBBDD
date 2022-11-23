<?php
namespace App\services\impl;
 
use App\services\ILibrosService;
use App\DTO\impl\LibroDTO;
use App\DAO\impl\LibrosStaticDAO;
use App\DAO\impl\LibrosJSONDAO;
use App\factories\LibrosFactory;
use Exception;
 
class LibrosService implements ILibrosService {

private LibrosFactory $factories;

function __construct(){
    $this -> factories =new LibrosFactory();
}
    public function all(?int $limit): array {
        return $this -> factories -> getDAO() -> read($limit);
    }
 
    /**
     *
     * @param mixed $id
     *
     * @return \App\DTO\impl\LibroDTO
    */
    function find($id): LibroDTO {
        //@TODO
        return $this -> factories -> getDAO() -> findbyId($id);
    }
    function insert($libro): bool{
        return $this -> factories -> getDAO() -> create($libro);
    }

    function update($id,$libro):bool{
        return $this -> factories -> getDAO() -> update($id,$libro);
    }
    function delete($id):bool{
        return $this -> factories -> getDAO() -> delete($id);
    }
}