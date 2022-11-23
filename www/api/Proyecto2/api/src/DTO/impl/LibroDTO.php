<?php
namespace App\DTO\impl;
use App\DTO\IDTOCheckFields;
use JsonSerializable;
 
class LibroDTO implements JsonSerializable{
 
    /**
     * @param $id int 
     * @param $titulo string 
     * @param $autor string 
     * @param $genero string 
     */
    function __construct(private ?int $id, private string $titulo, private string $autor, private string $genero) 
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
    }
 
 
    /**
     * @return int
     */
    public function id(): int {
        return $this->id;
    }
 
    /**
     * @return string
     */
    public function titulo(): string {
        return $this->titulo;
    }
 
    /**
     * @return int
     */
    public function autor(): string {
        return $this->autor;
    }
 
    /**
     * @return int
     */
    public function genero(): string {
        return $this->genero;
    }
    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value of any type other than a resource .
     */
    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'genero' => $this->genero
        ];      
    }

    public static function checkFields(?int $id,array $data):LibroDTO{
        if(isset($data["titulo"]) && isset($data["autor"]) && isset($data["genero"])){
            $libro=new LibroDTO($id,$data["titulo"],$data["autor"],$data["genero"]);
            return $libro;
        }else{
            throw new \Exception("Los campos son incorrectos o estan vacios",400);
        }   
    }
}