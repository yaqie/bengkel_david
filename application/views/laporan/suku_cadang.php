<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <a href="" class="btn btn-success" onclick="myFunction()">Print</a>
      <script>
      function myFunction() {
      window.print();
      }
      </script>
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