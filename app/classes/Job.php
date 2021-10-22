<?php

namespace App\classes;
use App\classes\Database;
class Job {
	

    public function getAllJob() {
    $sql1= "SELECT jobs.*, categories.name FROM jobs INNER JOIN categories ON jobs.category_id=categories.id
     ORDER BY post_date DESC ";
    $link= new Database();
    $dblink=$link->dbcon();
    $result  = $dblink->query($sql1);

    return $result;
    }
    public function getAllCategoriesById($id){
        $sql1= "SELECT jobs.*, categories.name FROM jobs INNER JOIN categories ON jobs.category_id=categories.id
        WHERE jobs.category_id=$id  ORDER BY post_date DESC ";
    $link= new Database();
    $dblink=$link->dbcon();
    $result  = $dblink->query($sql1);
    return $result;
    }
    public function getAllCategoryById($id){

      $sql1= "SELECT jobs.*, categories.name FROM jobs INNER JOIN categories ON jobs.category_id=categories.id
      WHERE jobs.id=$id  ORDER BY post_date DESC ";
  $link= new Database();
  $dblink=$link->dbcon();
  $result  = $dblink->query($sql1);
  return $result;
  }
  public function editCategoriesPost($id){
    $sql1= "SELECT jobs.*, categories.name FROM jobs INNER JOIN categories ON jobs.category_id=categories.id
    WHERE jobs.id=$id  ORDER BY post_date DESC ";
$link= new Database();
$dblink=$link->dbcon();
$result  = $dblink->query($sql1);
return $result;
}

public function updateCategoriesPost($id,$data){
  $link= new Database();
  $dblink=$link->dbcon();

 $job_title= $dblink->real_escape_string($data['job_title']);
 $company= $dblink->real_escape_string($data['company']);
 $category_id= $dblink->real_escape_string($data['category']);
 $description= $dblink->real_escape_string($data['description']);
 $location= $dblink->real_escape_string($data['location']);
 $salary= $dblink->real_escape_string($data['salary']);
 $contact_user= $dblink->real_escape_string($data['contact_user']);
 $contact_email= $dblink->real_escape_string($data['contact_email']); 
  $sql1= "UPDATE jobs SET category_id='$category_id',job_title='$job_title',
  description='$description',company='$company',location='$location',salary='$salary',contact_user='$contact_user'
  ,contact_email='$contact_email' WHERE id='$id'";
$link= new Database();
$dblink=$link->dbcon();
$result  = $dblink->query($sql1);
if($result)
{
  
$msg="Job has been updated";

  return $msg;
   
}
 else 
 {
   header('Location:index.php');
 }

}

    public function createJob($data) {
    $link= new Database();
    $dblink=$link->dbcon();

   $job_title= $dblink->real_escape_string($data['job_title']);
   $company= $dblink->real_escape_string($data['company']);
   $category_id= $dblink->real_escape_string($data['category']);
   $description= $dblink->real_escape_string($data['description']);
   $location= $dblink->real_escape_string($data['location']);
   $salary= $dblink->real_escape_string($data['salary']);
   $contact_user= $dblink->real_escape_string($data['contact_user']);
   $contact_email= $dblink->real_escape_string($data['contact_email']);              
   $sql1 = "INSERT INTO jobs (job_title,company,category_id,description,location,salary,contact_user,contact_email)
   VALUES ('{$job_title}','{$company}','{$category_id}','{$description}','{$location}','{$salary}','{$contact_user}','{$contact_email}')";
       $result  = $dblink->query($sql1);
   
      if($result)
      {
        
      $msg="Job has been listed";
      /*session_start();
      $_SESSION['msge'] ="Job created successfully";  
          
              return     $_SESSION['msge'];
      */
        return $msg;
          
  
      }
       else 
       {
         header('Location:index.php');
       }
      }
     public function deleteJob($id) {
      $link= new Database();
      $dblink=$link->dbcon();  
      $sql="DELETE FROM jobs  WHERE id='$id'";
      $result  = $dblink->query($sql);
      if($result)
    {
      header('Location:index.php');
    }   
   
     }
       
    
}


?>