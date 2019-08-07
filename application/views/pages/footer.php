<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center-mobile">
                    <h3 class="white"><?= $dt_contact->nama ?></h3>
                    <h5 class="light regular light-white"><?= $dt_contact->desc ?></h5>
                </div>
                <div class="col-sm-6 text-center-mobile">
                    <div class="col-sm-12 text-center-mobile">
                        <h5 class="light-white light">Email</h5>
                        <h3 class="regular white"><?= $dt_contact->email ?></h3>
                    </div>
                    <div class="col-sm-12 text-center-mobile">
                        <h5 class="light-white light">Telp</h5>
                        <h3 class="regular white"><?= $dt_contact->telp ?></h3>
                    </div>
                    <div class="col-sm-12 text-center-mobile">
                        <h5 class="light-white light">Alamat</h5>
                        <h3 class="regular white"><?= $dt_contact->alamat ?></h3>
                    </div>
                    <div class="col-sm-12 text-center-mobile">
                        <h5 class="light-white light">Jam Buka</h5>
                        <h3 class="regular white"><?= $jamoperasional->text1 ?></h3>
                        <h3 class="regular white"><?= $jamoperasional->text2 ?></h3>
                    </div>
                </div>
            </div>
            <div class="row bottom-footer text-center-mobile">
                <div class="col-sm-8">
                    <p>&copy; 2019 All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Holder for mobile navigation -->
    <div class="mobile-nav">
        <ul>
        </ul>
        <a href="#" class="close-link"><i class="arrow_up"></i></a>
    </div>
    <!-- Scripts -->
    <script src="<?= base_url('assets/landing/js/') ?>jquery-1.11.1.min.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>bootstrap.min.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>wow.min.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>typewriter.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>jquery.onepagenav.js"></script>
    <script src="<?= base_url('assets/landing/js/') ?>main.js"></script>
</body>

</html>