<?php
namespace App\services;
use App\DTO\impl\LibroDTO;
 
interface ILibrosService {
    public function all(?int $limit): array;
    public function find($id): LibroDTO;
}