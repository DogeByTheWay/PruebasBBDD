<?php
namespace App\controllers;
 
use App\services\impl\LibrosService;
use App\services\ILibrosService;
use App\factories\LibrosFactory;
use App\response\HTTPResponse;
use App\DTO\impl\LibroDTO;
use Exception;

class LibrosController {

    public function all(){
        $limit=intval(getallheaders()["start"]);
        HTTPResponse::json(200,LibrosFactory::getService() -> all($limit));
    }
 
    public function find($id){
        try{
            HTTPResponse::json(200,LibrosFactory::getService() -> find($id));
        }catch(Exception $e){
            HTTPResponse::json(404,$e -> getMessage());
        }
        
    }

    public function insert() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $libro = LibroDTO::checkFields($data['id'],$data);
            LibrosFactory::getService() -> insert($libro);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function update($id){
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $libro = LibroDTO::checkFields($id,$data);
            LibrosFactory::getService() -> update($id , $libro);
            HTTPResponse::json(203, "Recurso actualizado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
    public function delete($id){
        try {
            LibrosFactory::getService() -> delete($id);
            HTTPResponse::json(203, "Recurso eliminado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
}