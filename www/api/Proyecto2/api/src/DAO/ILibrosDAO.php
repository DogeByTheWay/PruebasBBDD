<?php
namespace App\DAO;
use App\DTO\impl\LibroDTO;
 
interface ILibrosDAO {
 
    public function create(LibroDTO $libro): bool;
    public function read(?int $limit): array;
    public function findById(int $id): LibroDTO;
    public function update(int $id, LibroDTO $libro): bool;
    public function delete(int $id): bool;
}