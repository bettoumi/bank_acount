<!-- transfart Modal -->
<!-- ================================================================= -->
<button   data-toggle="modal" class="btn btn-outline-danger col-12 col-md-6 col-lg-4" data-target="#transfertModal<?php echo $acount->id();?>">virement</button>

<div class="modal fade" id="transfertModal<?php echo $acount->id();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">virement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="amount" class="form-control-label">montant</label>
            <input type="number" step="any" name="amount" class="form-control" id="amount">
            <input type='hidden' name='id' value='<?php echo $acount->id();?>'>
          </div>
          <div class="form-group">
          <select name="iddist">
             <!-- <option value="choisir un compte" selected disabled>choisir un compte</option> -->
            <?php 
             foreach ($allcount  as $act ) 
             {
                  if($act->id()!== $acount->id())
               ?>
                
                
                
                 <option value="<?php echo $act->id(); ?>"><?php echo $act->namecustomer(); ?></option>
                
              <?php  
             }
             ?>

                
             </select> 
          </div>
          <input type="submit" class="btn btn-outline-danger" name="transfert" value="transferer">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>