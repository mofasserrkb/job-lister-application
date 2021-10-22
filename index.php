<?php
require_once 'vendor/autoload.php';
$link=new App\classes\Job();
$post=$link->getAllJob();
$catlink= new App\classes\Categories();
$cat=$catlink->getAllCategories();

?>

<?php   require_once 'header.php';?>

      <div class="jumbotron ">
        
        <h1 class="display-3">Find A Job</h1>
        
       <form method="POST" action="">
         <select name="category" class="form-control">
           <option value="0">Choose Category </option>
        <?php 
       if ($cat) {

     while( $row1 = $cat->fetch_assoc()) { ?>
       <option value="<?= $row1['id'] ?>"><?= $row1['name'] ?>
         
       </option>
        <?php }} ?>
         </select>
       <br>
      
   <input type="submit" class="btn btn-lg btn-primary"  value="FIND"> 
       </form>
      </div>

      <div class="row marketing">
      <?php
  if($_SERVER["REQUEST_METHOD"]=="POST") {
   $catpost=$_POST['category'];
   $getcatPost=$link->getAllCategoriesById($catpost);
   while( $row = $getcatPost->fetch_assoc()) { ?>
   <div>
    <br>
   </div>
    <div class="col-md-10 bg-secondary">
      <h4> <?php echo $row['job_title'];?></h4>
      <p><?= $row['description'] ?></p>
    </div>
    <div class="col-md-2 bg-secondary">
     <br>
    <a class="btn btn-success" href="job-single.php?id=<?= $row['id']  ?>&catid=<?= $row['category_id'] ?>">View</a>
    </div>

<?php } }

  else {

    while( $row = $post->fetch_assoc()) { ?>
       <div>
         <br>
       </div>
       <div class="col-md-10 bg-secondary ">
         <h4><?php echo $row['job_title'];?></h4>
         <p><?= $row['description'] ?></p>
       </div>
       <div class="col-md-2 bg-secondary">
       <br>  
       <a class="btn btn-success" href="job-single.php?id=<?= $row['id'] ?>&catid=<?= $row['category_id'] ?>">View</a>
       </div>
  
<?php } }

?>
      
      </div>


<?php   require_once 'footer.php';?>