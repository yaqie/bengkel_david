
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center" style="margin-bottom:50px;">
				<h2 class="margin-top">Booking Antrian</h2>
			</div>
			<div class="row">
            <div class="row text-center title">
                <h2><?= $antrian + $jamoperasional->text3 ?></h2>
                <h4 class="light muted">Sedang Dalam Antrian</h4>
            </div>
                <div class="col-md-12" style="margin-top:50px;margin-bottom:50px;">
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
	</section>
