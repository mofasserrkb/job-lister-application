<?php
require_once 'vendor/autoload.php';
$catlink= new App\classes\Categories();
$cjob=new App\classes\Job();
$cat=$catlink->getAllCategories();
if(isset($_POST['submit'])){

$listMsg=$cjob->createJob($_POST);
/*
if ($_SESSION['msge']==$listMsg)
           { ?>
            <h3>  <?php   echo  $_SESSION['msge']; ?> </h3>
          <?php } 

*/
          }
          
  

?>
<?php 
require_once "header.php";
?>
<h2 class="page-header">Create Job Listing </h2>
<?php 
if(isset($_POST['submit'])){

           ?>
          <div class=" bg-success" >  

            <h3 > <p class="text-primary"> <?php   echo  $listMsg; ?></p> </h3>
          
         </div>
<?php  
}
?>
   
<form method="post" action="">
    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" required>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <option value="0">Choose Category</option>
            <?php 
       if ($cat) {

     while( $row1 = $cat->fetch_assoc()) { ?>
       <option value="<?= $row1['id'] ?>"><?= $row1['name'] ?>
         
       </option>
        <?php }} ?>
        </select>
    </div>
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="job_title" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="8" >
        </textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" required>
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" class="form-control" name="salary" required>
    </div>
    <div class="form-group">
        <label>Contact User</label>
        <input type="text" class="form-control" name="contact_user" required>
    </div>
    <div class="form-group">
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contact_email" required>
    </div>
    <br> 
    <input type="submit" class="btn btn-success" value="Submit" name="submit">

</form>
<?php 
require_once "footer.php";
?>