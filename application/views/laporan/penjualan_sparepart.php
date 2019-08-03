<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <br>
      <form action="<?= base_url('laporan/penjualan_sparepart_tgl'); ?>" method="post">
        <?php if ($this->uri->segment('3') != '' && $this->uri->segment('4') != '') { ?>
        <input type="date" name="date1" value="<?= $this->uri->segment('3') ?>">
        <input type="date" name="date2" value="<?= $this->uri->segment('4') ?>">
        <?php } else { ?>
        <input type="date" name="date1">
        <input type="date" name="date2">
        <?php } ?>
        <button>Tampil</button>
      </form>
      <a href="" class="btn btn-success" onclick="myFunction()">Print</a>
      <script>
      function myFunction() {
      window.print();
      }
      </script>
      <br>
      <br>

<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Transaksi</th>
    <th>Nama Pelanggan</th>
    <th>Nama Suku Cadang</th>
    <th>Kuantiti Penjualan</th>
    <th>Tanggal Transaksi</th>
    <th>Harga Modal</th>
    <th>Harga Jual</th>
    <th>Pendapatan Bersih</th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($penjualan_sparepart)){
      $total = 0;
    foreach($penjualan_sparepart as $row){
    $pelanggan = $this->db->query("SELECT * FROM pelanggan WHERE kd_pelanggan = '$row->kd_pelanggan'")->row();
    $transaksi_detail = $this->db->query("SELECT * FROM transaksi_detail WHERE kd_transaksi = '$row->kd_transaksi'")->row();
    $sparepart = $this->db->query("SELECT * FROM sparepart WHERE kd_part = '$transaksi_detail->kd_part'")->row();
    $total += ($sparepart->harga - $sparepart->harga_modal) * $transaksi_detail->qty;
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->kd_transaksi; ?></td>
            <td><?php if($row->kd_pelanggan == "0"){ echo "-"; } else { echo $pelanggan->nm_pelanggan; } ?></td>
            <td><?php echo $sparepart->nm_part; ?></td>
            <td><?php echo $transaksi_detail->qty; ?></td>
            <td><?php echo $row->tanggal_penjualan; ?></td>
            <td><?php echo currency_format($sparepart->harga_modal); ?></td>
            <td><?php echo currency_format($sparepart->harga); ?></td>
            <td><b><?php echo currency_format(($sparepart->harga - $sparepart->harga_modal) * $transaksi_detail->qty); ?></b></td>
        </tr>
      <?php }
  }
  ?>
  <tr>
  <td colspan="8"><b>Total Harga</b></td>
  <td><b><?= currency_format($total) ?></b></td>
  </tr>
</tbody>
</table>

    </div>
  </div>
  <hr>
</div>