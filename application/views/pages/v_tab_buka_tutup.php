<?php if(isset($data_contact)){
?>
<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_jam')?>">
<div class="row">
<div class="col-md-6">
      <fieldset class="form-group">
          <label class="form-label">Jam Operasional 1</label>
          <input name="jadwal1" type="text" value="<?php echo $jamoperasional->text1; ?>" class="form-control" required>
      </fieldset>
      <fieldset class="form-group">
          <label class="form-label">Jam Operasional 2</label>
          <input name="jadwal2" type="text" value="<?php echo $jamoperasional->text2; ?>" class="form-control" required>
      </fieldset>
      <fieldset class="form-group">
          <label class="form-label">Antrian</label>
          <input name="antrian" type="text" value="<?php echo $jamoperasional->text3; ?>" class="form-control" required>
      </fieldset>
</div>
</div>

<input name="id" type="hidden" value="1">
<div class="modal-footer">
<button class="btn btn-primary" type="submit">Simpan</button>
</div>
</form>
<?php
}
?>