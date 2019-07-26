<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Nomor Hanphone</th>
    <th>Nomor Kendaraan</th>
    <th>Booking Untuk Tanggal</th>
    <th>Jam</th>
    <th>Tanggal Booking</th>
    <th>#</th>
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
              <td><?php echo $row->nohp; ?></td>
              <td><?php echo $row->nokendaraan; ?></td>
              <td><?php echo $row->tanggal; ?></td>
              <td><?php echo $row->jam; ?></td>
              <td><?php echo $row->tanggaljambooking; ?></td>
              <td align="center">
                <?php
                if($row->status == 0){
                ?>
                  <a class="btn btn-success" href="<?php echo site_url('booking/terima/'.$row->id_booking);?>" >Terima</a>
                  <a class="btn btn-warning" href="<?php echo site_url('booking/tolak/'.$row->id_booking);?>" >Tolak</a>
                <?php
                } else if($row->status == 1) {
                  ?>
                  <a class="btn btn-info" href="<?php echo site_url('booking/selesai/'.$row->id_booking);?>"> Selesai</a>
                <?php
                } else if($row->status == 2 || $row->status == -1) {
                  ?>
                  <a class="btn btn-danger" href="<?php echo site_url('booking/hapus/'.$row->id_booking);?>"> Hapus</a>
                <?php
                }
                ?>
              </td>
          </tr>
      <?php }
  }
  ?>
</tbody>
</table>
