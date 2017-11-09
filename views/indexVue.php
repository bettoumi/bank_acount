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
    <a href="#" class="btn btn-outline-danger col-12 col-md-6 col-lg-4" data-toggle="modal" data-target="#withdrawalModal<?php echo $acount->id();?>">retrait</a>
    <a href="#" class="btn btn-outline-danger col-12 col-md-6 col-lg-4" data-toggle="modal" data-target="#payModal<?php echo $acount->id();?>" >versement</a>
    <a href="#" class="btn btn-outline-danger col-12 col-md-6 col-lg-4">virement</a>
    <form action=""  class="col-12 col-md-6 col-lg-12 mt-2 " method="post">
      <input type='hidden' value="<?php echo $acount->id();?>" name="id">
      <input type="submit" class="btn btn-outline-danger"  name="delete" value="supprimer">
   </form>
   </div>
    <?php include_once 'paymentmodal.php';

          include_once 'withdrawalmodal.php';
          include_once 'transfermodal.php';
    ?>

  </div>
</div>
<?php
}
?>
</div>
 <?php
   include("template/footer.php")
  ?>
