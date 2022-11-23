<?php
namespace App\factories;
use App\services\impl\LibrosService;
use App\DAO\impl\LibrosStaticDAO;
use App\DAO\impl\LibrosJSONDAO;
use App\DAO\impl\LibrosDBDAO;

class LibrosFactory{


 public static function getService() {
    return new LibrosService();
}

 public static function getDAO(){
    return new LibrosJSONDAO();
}


}