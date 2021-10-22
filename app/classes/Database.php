<?php 
namespace App\classes;

use mysqli;

class Database {
 public $host= "localhost";
 public $user= "root";
 public $pass="";
 public  $db="joblister";
 public $link;
 public function dbcon() {
 
   $this->link= new mysqli($this->host,$this->user,$this->pass,$this->db);
   return $this->link;
 } 
}

?>