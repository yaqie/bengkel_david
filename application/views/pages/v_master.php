<!--========================= Content Wrapper ==============================-->
<?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
<br>   
  <div class="container">
      <div class="row">
        <div class="col-md-12">
        <center>
        <div class="col-6">
        <?php echo $this->session->flashdata('message');?>
        </div>
        </center>
        
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'home' || $this->session->flashdata('tabmaster') == ''){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'home' || $this->session->flashdata('tabmaster') == ''){ echo "active"; } ?>" href="#home" data-toggle="tab">Jam Operasional</a>
          </li>
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'booking'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'booking'){ echo "active"; } ?>" href="#tabBooking" data-toggle="tab">Booking</a>
          </li>
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'pelanggan'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'pelanggan'){ echo "active"; } ?>" href="#tabPelanggan" data-toggle="tab">Pelanggan</a>
          </li>
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'pemasok'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'pemasok'){ echo "active"; } ?>" href="#tabPemasok" data-toggle="tab">Pemasok</a>
          </li>
		      <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'part'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'part'){ echo "active"; } ?>" href="#tabPart"  data-toggle="tab">Sparepart</a>
          </li>
		  <!-- </li> -->
		      <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'service'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'service'){ echo "active"; } ?>" href="#tabService"  data-toggle="tab">Service</a>
          </li>
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'user'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'user'){ echo "active"; } ?>" href="#tabUser"  data-toggle="tab">User</a>
          </li>
          <li class="nav-item <?php if ($this->session->flashdata('tabmaster') == 'identitas'){ echo "active"; } ?>">
            <a class="nav-link <?php if ($this->session->flashdata('tabmaster') == 'identitas'){ echo "active"; } ?>" href="#tabContact"  data-toggle="tab">Identitas</a>
          </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'home' || $this->session->flashdata('tabmaster') == ''){ echo "active"; } ?>" id="home"><br><?php $this->load->view('pages/v_tab_buka_tutup')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'booking'){ echo "active"; } ?>" id="tabBooking"><br><?php $this->load->view('pages/v_tab_master_booking')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'pelanggan'){ echo "active"; } ?>" id="tabPelanggan"><br><?php $this->load->view('pages/v_tab_master_pelanggan')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'pemasok'){ echo "active"; } ?>" id="tabPemasok"><br><?php $this->load->view('pages/v_tab_master_pemasok')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'service'){ echo "active"; } ?>" id="tabService"><br><?php $this->load->view('pages/v_tab_master_service')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'part'){ echo "active"; } ?>" id="tabPart"><br><?php $this->load->view('pages/v_tab_master_part')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'user'){ echo "active"; } ?>" id="tabUser"><br><?php $this->load->view('pages/v_tab_master_user')?></div>
            <div class="tab-pane <?php if ($this->session->flashdata('tabmaster') == 'identitas'){ echo "active"; } ?>" id="tabContact"><br><?php $this->load->view('pages/v_tab_master_contact')?></div>
        </div>

      </div>
    </div>
    <hr>
  </div>
<?php } else { ?>
    <br>   
    <div class="container">
        <div class="row">
          <div class="col-md-12">
          Maaf, Anda tidak berhak masuk ke halaman ini
          </div>
        </div>
        <hr>
      </div>
<?php } ?>