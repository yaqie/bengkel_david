<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <br>
      <h2>Laporan Servis Minggu Ini</h2>
      <a href="" class="btn btn-success" onclick="myFunction()">Print</a>
      <script>
      function myFunction() {
      window.print();
      }
      </script>
      <br>

<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Transaksi</th>
    <th>Nama Pelanggan</th>
    <th>Jasa Servis</th>
    <th>Tanggal Transaksi</th>
    <th>Harga</th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($jasa_servis)){
      $total = 0;
    foreach($jasa_servis as $row){
    $pelanggan = $this->db->query("SELECT * FROM pelanggan WHERE kd_pelanggan = '$row->kd_pelanggan'")->row();
    $jasa_servis = $this->db->query("SELECT * FROM servis WHERE id_servis = '$row->id_servis'")->row();
    $total += $jasa_servis->harga;
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->kd_transaksi; ?></td>
            <td><?php echo $pelanggan->nm_pelanggan; ?></td>
            <td><?php echo $jasa_servis->nm_layanan; ?></td>
            <td><?php echo $row->tanggal_penjualan; ?></td>
            <td><?php echo currency_format($jasa_servis->harga); ?></td>
        </tr>
      <?php }
  }
  ?>
  <tr>
  <td colspan="5"><b>Total Harga</b></td>
  <td><?= currency_format($total) ?></td>
  </tr>
</tbody>
</table>

    </div>
  </div>
  <hr>
</div>