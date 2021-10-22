<?php 
namespace App\classes;
use App\classes\Database;

class Categories {
	
  
  
    public function getAllCategories() {
    $sql1= "SELECT * FROM categories";
    $link= new Database();
    $dblink=$link->dbcon();
    $result  = $dblink->query($sql1);

    return $result;
    }
   
    
}
