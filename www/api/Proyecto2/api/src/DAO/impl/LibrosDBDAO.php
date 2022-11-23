<?php
namespace App\DAO\impl;
use App\DAO\ILibrosDAO;
use App\DTO\impl\LibroDTO;
use ORM\DB;
class LibrosDBDAO implements ILibrosDAO {
 
  function create(LibroDTO $libro): bool {
    return DB::table('libros')->insert(['titulo' => $libro->titulo(), 'autor' => $libro->autor(), 'genero' => $libro->genero()]);
 }
  
  function read($limit): array {
     $result = array();
     $db_data = DB::table('libros')->select('*')->get($limit);
     foreach ($db_data as $libro) {
         $result[] = new LibroDTO(
             $libro->id, 
             $libro->titulo, 
             $libro->autor, 
             $libro->genero
         );            
     }
 return $result;
 }
  
  function findById(int $id): LibroDTO {
     $params = [
         "id" => $id
     ];
     $db_data = DB::table('libros')->find($id);
     $result = new LibroDTO(
             $db_data->id, 
             $db_data->titulo, 
             $db_data->autor, 
             $db_data->genero
         );            
 return $result; 
 }
 
  function update(int $id, LibroDTO $libro): bool {
    return DB::table('libros')->update($id, ['titulo' => $libro->titulo(), 'autor' => $libro->autor(), 'genero' => $libro->genero()]);
 }
  
  function delete(int $id): bool {
    return DB::table('libros')->delete($id);
 }


}