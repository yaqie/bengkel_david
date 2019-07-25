<main role="main">
  
<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h3 class="text-info" style="text-align: center;margin-top:50px;">Booking Antrian</h3>
    <form action="<?= base_url('booking/simpan') ?>" method="post">
      <label for="">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control">
      <label for="">Nomor Hanphone</label>
      <input type="text" name="nohp" class="form-control">
      <label for="">Nomor Kendaraan</label>
      <input type="text" name="nokendaraan" class="form-control">
      <label for="">Booking Untuk Tanggal</label>
      <input type="date" name="date" class="form-control">
      <label for="">Jam Booking</label>
      <input type="time" name="jam" class="form-control">
      <br>
      <button type="submit" class="btn btn-success">Booking</button>
    </form>





    <div class="col-md-12" style="margin-top:20px">
    <h3 class="text-info" style="text-align: center">List Booking Antrian</h3>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jam Booking</th>
          <th>Untuk Tanggal</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $no=1;
          if(isset($data_booking)){
          foreach($data_booking as $row){
          ?>
              <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->jam; ?></td>
                  <td><?php echo $row->tanggal; ?></td>
              </tr>
            <?php }
        }
        ?>
      </tbody>
    </table>

    </div>

    </div>
  </div>
  <hr>
</div>
</main>