<main role="main">
  <div class="jumbotron">
    <div class="container">
      Selamat Datang di BENGKEL LANCAR MOTOR 2
    </div>
  </div>
  
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <?php if(isset($dt_contact)){
      foreach($dt_contact as $row){
        ?>
    <div align="center">
        <h3 class="text-info" style="text-align: center"><?php echo $row->nama?></h3>
        <p><?php echo $row->desc?></p>
        <p class="muted"><?php echo $row->alamat?></p>
        <b>
        <h6 class="muted"><?php echo $jamoperasional->text1; ?></h6>
        <h6 class="muted"><?php echo $jamoperasional->text2; ?></h6>
        </b>
        <h6 class="muted"><?php echo $row->email?> || <?php echo $row->telp?> || <?php echo $row->website?></h6>
    </div>
    <?php }
    }
    ?>

    </div>

    <div class="col-md-12" style="margin-top:50px">
      <div style="padding:10px;border-radius:10px;background:#eee;margin:0 auto; width:400px;margin-bottom:20px;">
        <h3 class="text-info" style="text-align: center;">Sedang Dalam Antrian : <?= $antrian ?></h3>
      </div>
    </div>

    <div class="col-md-12" style="margin-top:20px">
    <h3 class="text-info" style="text-align: center">Stok Persediaan Sparepart</h3>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Sparepart</th>
          <th>Nama Suku Cadang</th>
          <th>Jumlah Barang</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $no=1;
          if(isset($persediaan_suku_cadang)){
          foreach($persediaan_suku_cadang as $row){
          ?>
              <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->kd_part; ?></td>
                  <td><?php echo $row->nm_part; ?></td>
                  <td><?php echo $row->stok; ?></td>
                  <td><?php echo currency_format($row->harga); ?></td>
              </tr>
            <?php }
        }
        ?>
      </tbody>
    </table>

    </div>
    
    
    
    
    



    </div>
    <hr>
  </div>
</main>