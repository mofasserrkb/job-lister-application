<?php
require_once 'vendor/autoload.php';
$catlink= new App\classes\Categories();
$cjob=new App\classes\Job();
$cat=$catlink->getAllCategories();
$getId=$_GET['id'];
$getCatId=$_GET['catid'];

$catpost=$cjob-> editCategoriesPost($getId);
$row = $catpost->fetch_assoc();

if(isset($_POST['submit'])){

$listMsg=$cjob->updateCategoriesPost($getId,$_POST);
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
<h2 class="page-header">Edit Job Listing </h2>
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
        <input type="text" class="form-control" name="company" value="<?= $row['company'] ?>">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <option value="0">Choose Category</option>
            <?php 
       if ($cat) {

     while( $row1 = $cat->fetch_assoc()) { ?>
       <option 
       <?=$row1['id']==$getCatId?'selected':'' ?> value="<?= $row1['id']?>"><?= $row1['name']?> 
       </option>
        <?php }} ?>
        </select>
    </div>
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="job_title" value=<?= $row['job_title']    ?>>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="8">
        <?= $row['description'] ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" value="<?= $row['location']    ?>">
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" class="form-control" name="salary" value="<?= $row['salary']    ?>">
    </div>
    <div class="form-group">
        <label>Contact User</label>
        <input type="text" class="form-control" name="contact_user" value="<?=$row['contact_user']?>">
    </div>
    <div class="form-group">
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contact_email" value="<?=$row['contact_email']?>">
    </div>
    <br> 
    <input type="submit" class="btn btn-success" value="Update" name="submit">

</form>
<?php 
require_once "footer.php";
?>