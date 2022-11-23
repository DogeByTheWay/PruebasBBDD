<?php

namespace App\DTO;
use App\DTO\impl\LibroDTO;

interface IDTOCheckFields{

    public static function checkFields(?int $id,array $data):LibroDTO;
}