<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <br>
      <form action="<?= base_url('laporan/pembelian_sparepart_tgl'); ?>" method="post">
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
    <th>ID Pembelian</th>
    <th>Kode Sparepart</th>
    <th>Nama Sparepart</th>
    <th>Kode Pemasok</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Harga Modal</th>
    <th>Subtotal</th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($pembelian_sparepart)){
      $total = 0;
    foreach($pembelian_sparepart as $row){
      $total += $row->harga_modal * $row->jumlah;
    ?>
        <tr>
            <td><?php echo $row->id_pembelian; ?></td>
            <td><?php echo $row->kd_part; ?></td>
            <td><?php echo $row->nm_part; ?></td>
            <td><?php echo $row->kd_pemasok; ?></td>
            <td><?php echo $row->jumlah; ?></td>
            <td><?php $exp = explode(' ',$row->tanggaljam); echo $exp[0]; ?></td>
            <td><?php echo currency_format($row->harga_modal); ?></td>
            <td><?php echo currency_format($row->harga_modal * $row->jumlah); ?></td>
        </tr>
      <?php }
  }
  ?>
  <tr>
  <td colspan="7"><b>Total Harga</b></td>
  <td><b><?= currency_format($total) ?></b></td>
  </tr>
</tbody>
</table>

    </div>
  </div>
  <hr>
</div>