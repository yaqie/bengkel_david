<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
        <th>No</th>
        <th>Kode Sparepart</th>
        <th>Nama Sparepart</th>
        <th>Nama Pemasok</th>
        <th>Stok</th>
        <th>Letak Barang</th>
        <th>Harga Modal</th>
        <th>Harga Jual</th>
      <th>
       <a href="#AddPart" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($data_barang)){
    foreach($data_barang as $row){
      $pemasok = $this->db->query("SELECT * FROM pemasok WHERE kd_pemasok = '$row->kd_pemasok' ")->row();
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->kd_part; ?></td>
        <td><?php echo $row->nm_part; ?></td>
        <td><?php echo $pemasok->nm_pemasok; ?></td>
        <td><?php echo $row->stok; ?></td>
        <td><?php echo $row->letak_barang; ?></td>
        <td><?php echo currency_format($row->harga_modal);?></td>
        <td><?php echo currency_format($row->harga);?></td>
        <td align="center">
            <a class="btn btn-primary" href="#EditPart<?php echo $row->kd_part?>" data-toggle="modal"> Edit</a>
            <a class="btn btn-danger" href="<?php echo site_url('master/hapus_barang/'.$row->kd_part);?>"
            onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
        </td>
        </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Part -->
<div class="modal fade" id="AddPart" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Sparepart</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_barang')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Sparepart</label>
                    <input name="kd_part" type="text" value="<?php echo $kd_part; ?>" class="form-control" readonly>
                </fieldset>
          </div>
          
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nama Sparepart</label>
                    <input name="nm_part" placeholder="Nama Sparepart" class="form-control" type="text">
                </fieldset>
          </div>
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Pemasok</label>
                    <select name="pemasok" id="" class="form-control" required>
                      <option value="">Pilih Pemasok</option>
                      <?php
                      $no=1;
                      if(isset($data_pemasok)){
                      foreach($data_pemasok as $row){
                      ?>
                        <option value="<?php echo $row->kd_pemasok; ?>"><?php echo $row->nm_pemasok; ?></option>
                      <?php
                      }}
                      ?>
                    </select>
                </fieldset>
          </div>
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Jumlah</label>
                    <input name="stok" placeholder="Jumlah Beli" class="form-control" type="number">
                </fieldset>
          </div>
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Harga Modal</label>
                    <input name="harga1" placeholder="Harga / Unit" class="form-control" type="number">
                </fieldset>
          </div>
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Harga Jual</label>
                    <input name="harga2" placeholder="Harga / Unit" class="form-control" type="number">
                </fieldset>
          </div>
          <div class="col-md-12">
                <fieldset class="form-group">
                    <label class="form-label">Letak Barang</label>
                    <input name="letak" placeholder="Letak Barang" class="form-control" type="text">
                </fieldset>
          </div>
        
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- Edit Sparepart -->
<?php
if (isset($data_barang)){
    foreach($data_barang as $row){
        ?>
<div class="modal fade" id="EditPart<?php echo $row->kd_part?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Sparepart</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_barang')?>">
          <div class="row">

          <div class="col-md-6">
            <fieldset class="form-group">
              <label class="form-label">Kode Sparepart</label>
              <input name="kd_part" type="text" value="<?php echo $row->kd_part; ?>" class="form-control" readonly>
            </fieldset>
          </div>
          <div class="col-md-6">

                <fieldset class="form-group">
                    <label class="form-label">Nama Sparepart</label>
                    <input name="nm_part" class="form-control" type="text" value="<?php echo $row->nm_part; ?>">
                </fieldset>
          </div>
          <div class="col-md-4">
                <fieldset class="form-group">
                    <label class="form-label">Pemasok</label>
                    <select name="pemasok" id="" class="form-control" required>
                      <option value="">Pilih Pemasok</option>
                      <?php
                      $no=1;
                      if(isset($data_pemasok)){
                      foreach($data_pemasok as $row_pemasok){
                      ?>
                        <option value="<?php echo $row_pemasok->kd_pemasok; ?>"><?php echo $row_pemasok->nm_pemasok; ?></option>
                      <?php
                      }}
                      ?>
                    </select>
                </fieldset>
          </div>
         
          <div class="col-md-4">
            <fieldset class="form-group">
              <label class="form-label">Stok</label>
              <input name="stok" class="form-control" type="number" value="<?php echo $row->stok; ?>" readonly>
            </fieldset>
          </div>
          <div class="col-md-4">
            <fieldset class="form-group">
              <label class="form-label">Jumlah</label>
              <input name="stok2" class="form-control" type="number" placeholder="Jumlah Beli">
            </fieldset>
          </div>
            
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Harga Modal</label>
                    <input name="harga1" class="form-control" type="number" value="<?php echo $row->harga_modal; ?>">
                </fieldset>  
          </div>
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Harga Jual</label>
                    <input name="harga2" class="form-control" type="number" value="<?php echo $row->harga; ?>">
                </fieldset>  
          </div>
          <div class="col-md-12">
                <fieldset class="form-group">
                    <label class="form-label">Letak Barang</label>
                    <input name="letak" placeholder="Letak Barang" class="form-control" type="text" value="<?php echo $row->letak_barang; ?>">
                </fieldset>
          </div>
        
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );
</script>
  <?php }
}
?>