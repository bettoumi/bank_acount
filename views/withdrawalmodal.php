<div class="modal fade" id="withdrawalModal<?php echo $acount->id();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retrait</h5>
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
          <input type="submit" class="btn btn-outline-danger" name="withdrawal" value="Retirer">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>