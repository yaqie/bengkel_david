
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center" style="margin-bottom:50px;">
				<h2 class="margin-top">Booking Antrian</h2>
			</div>
			<div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
				<form action="<?= base_url('booking/simpan') ?>" method="post">
					<label for="">Nama Lengkap</label>
					<input type="text" name="nama" style="padding:10px;margin-bottom:20px;" class="form-control" required>
					<label for="">Nomor Hanphone</label>
					<input type="text" name="nohp" style="padding:10px;margin-bottom:20px;" class="form-control" required>
					<label for="">Nomor Kendaraan</label>
					<input type="text" name="nokendaraan" style="padding:10px;margin-bottom:20px;" class="form-control" required>
					<label for="">Booking Untuk Tanggal</label>
					<input type="date" name="date" style="padding:10px;margin-bottom:20px;" class="form-control" required>
					<label for="">Jam Booking</label>
					<input type="time" name="jam" style="padding:10px;margin-bottom:20px;" class="form-control" required>
					<br>
					<button type="submit" class="btn btn-blue ripple trial-button" style="padding:10px;margin-bottom:20px;">Booking</button>
				</form>
                </div>
                <div class="col-md-3">
                </div>

			</div>
		</div>
	</section>
