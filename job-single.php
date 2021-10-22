<?php
require_once 'vendor/autoload.php';
$cat=new App\classes\Categories();
$post=new App\classes\JOb();
use App\classes\Database;
    $getId=$_GET['id'];
    $getCatId=$_GET['catid'];
    $catpost=$post-> getAllCategoryById($getId);
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
?>
<?php
require_once "header.php";
?>
<h2 class="page-header">
<?= $row['job_title']  ?> (<?=$row['location'] ?>)</h2>
<small>Posted By <?= $row['contact_user']?> on (<?= $row['post_date'] ?>)  </small>
<div>
<?= $row['description']  ?>
</div>
<ul class="list-group">
<li class="list-group-item"><strong>Company: </strong><?= $row['company'] ?></li>
<li class="list-group-item"><strong>Salary: </strong><?= $row['salary'] ?></li>
<li class="list-group-item"><strong>Contact Email: </strong><?= $row['contact_email'] ?></li>
</ul>
<br>
<br>
<a href="index.php">Go Back</a>
<br>
<br>
<div class="well">
    <a href="edit-post.php?id=<?= $getId  ?>&catid=<?= $getCatId ?>" class="btn btn-success">Edit</a>
    <a href="delete-post.php?id=<?= $getId  ?>&catid=<?= $getCatId ?>" class="btn btn-danger">Delete</a>
</div>

<?php
require_once "footer.php";
?>