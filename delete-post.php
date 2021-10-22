<?php
require_once 'vendor/autoload.php';
       
$deleteJob= new App\classes\job();
   if(isset($_GET['id']))
   {   
    
    
       $id=$_GET['id'];
         $deleteJob->deleteJob($id);
      
     
   }

?>