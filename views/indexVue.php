<?php
  include("template/header.php");
  include('addcountmodal.php');
 ?>


<div class="container-fluid mx-auto mt-5  justify-content-around row">
<?php foreach ($allcount as $acount ) {
	  
?>

<div class="card card-inverse col-12 col-md-6 col-lg-4" style="background-color:rgb(18,80,93) ; border-color: #333;">
  <div class="card-block">
    <h3 class="card-title">compte num: <?php echo $acount->id();?></h3>
    <h3 class="card-title">client:  <?php echo $acount->namecustomer();?></h3>
    <h3 class="card-title">sold:  <?php echo $acount->sold();?></h3>

    <div class="row  justify-content-around" >
    
      <?php require 'paymentmodal.php';

          require 'withdrawalmodal.php';
          require 'transfermodal.php';
    ?>

    
    <form action=""  class="col-12 col-md-6 col-lg-12 mt-2 " method="post">
      <input type='hidden' value="<?php echo $acount->id();?>" name="id">
      <input type="submit" class="btn btn-outline-danger"  name="delete" value="supprimer">
   </form>
   </div>
   
  </div>
</div>
<?php
}
?>
</div>
 <?php
   include("template/footer.php")
  ?>
