<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <br>
      <form action="<?= base_url('laporan/pendapatan_tgl'); ?>" method="post">
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
    <th>Suku Cadang</th>
    <th>Jasa Servis</th>
    <th>Kuantiti Penjualan Suku Cadang</th>
    <th>Tanggal Transaksi</th>
    <th>Harga Modal</th>
    <th>Harga Jual</th>
    <th>Harga Servis</th>
    <th>Pendapatan Bersih</th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($pendapatan)){
      $total = 0;
    foreach($pendapatan as $row){
    $pelanggan = $this->db->query("SELECT * FROM pelanggan WHERE kd_pelanggan = '$row->kd_pelanggan'")->row();
    // echo "<b>$row->kd_transaksi</b>";
    $h_transaksi_detail = $this->db->query("SELECT * FROM transaksi_detail WHERE kd_transaksi = '$row->kd_transaksi'")->num_rows();
    if($h_transaksi_detail == 0){
      $nama_sparepart = "-";
      $transaksi_qty = 0;
      $sparepart_modal = 0;
      $sparepart_jual = 0;
    } else if ($h_transaksi_detail != 0){
      $transaksi_detail = $this->db->query("SELECT * FROM transaksi_detail WHERE kd_transaksi = '$row->kd_transaksi'")->row();
      $sparepart = $this->db->query("SELECT * FROM sparepart WHERE kd_part = '$transaksi_detail->kd_part'")->row();
      $nama_sparepart = $sparepart->nm_part;
      $transaksi_qty = $transaksi_detail->qty;
      $sparepart_modal = $sparepart->harga_modal;
      $sparepart_jual = $sparepart->harga;
    }
    $jasa_servis = $this->db->query("SELECT * FROM servis WHERE id_servis = '$row->id_servis'")->row();
    $total += (($sparepart_jual - $sparepart_modal) * $transaksi_qty) + $jasa_servis->harga;
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->kd_transaksi; ?></td>
            <td><?php if ($row->kd_pelanggan == '0'){ echo "-"; } else { echo $pelanggan->nm_pelanggan; }; ?></td>
            <td><?php echo $nama_sparepart; ?></td>
            <td><?php echo $jasa_servis->nm_layanan; ?></td>
            <td><?php echo $transaksi_qty; ?></td>
            <td><?php echo $row->tanggal_penjualan; ?></td>
            <td><?php echo currency_format($sparepart_modal); ?></td>
            <td><?php echo currency_format($sparepart_jual); ?></td>
            <td><?php echo currency_format($jasa_servis->harga); ?></td>
            <td><b><?php echo currency_format((($sparepart_jual - $sparepart_modal) * $transaksi_qty) + $jasa_servis->harga); ?></b></td>
        </tr>
      <?php }
  }
  ?>
  <tr>
  <td colspan="10"><b>Total Pendapatan</b></td>
  <td><b><?= currency_format($total) ?></b></td>
  </tr>
</tbody>
</table>

    </div>
  </div>
  <hr>
</div>