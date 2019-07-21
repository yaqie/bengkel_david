<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Username atau Password Anda Salah !');
            redirect('');
        };

        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $jamoperasional = $this->db->get_where('setting', array('bagian' => 'jam_operasional'))->row();
        $data=array(
            'title'=>'Master Data',
            'jamoperasional'=>$jamoperasional,
            'active_master'=>'active',
            'kd_part'=>$this->MyModel->getKodeBarang(),
            'kd_pelanggan'=>$this->MyModel->getKodePelanggan(),
            'kd_user'=>$this->MyModel->getKodePengguna(),
			'data_service'=>$this->MyModel->getAllData('servis'),
            'data_barang'=>$this->MyModel->getAllData('sparepart'),
            'data_pelanggan'=>$this->MyModel->getAllData('pelanggan'),
            'data_contact'=>$this->MyModel->getAllData('contact'),
            'data_pegawai'=>$this->MyModel->getAllData('user'),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_master');
        $this->load->view('element/footer');
    }

//Method Insert
	function tambah_service(){
        $data=array(
            'nm_layanan'=>$this->input->post('nm_layanan'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->insertData('servis',$data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function tambah_barang(){
        $data=array(
            'kd_part'=>$this->input->post('kd_part'),
            'nm_part'=>$this->input->post('nm_part'),
            'stok'=>$this->input->post('stok'),
            'letak_barang'=>$this->input->post('letak'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->insertData('sparepart',$data);
        if ($this->session->userdata('LEVEL') != 'admin'){
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("dashboard");
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("master");
        }
    }
    function tambah_pelanggan(){
        $data=array(
            'kd_pelanggan'=> $this->input->post('kd_pelanggan'),
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->insertData('pelanggan',$data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function tambah_user(){
        $data=array(
            'kd_user'=> $this->input->post('kd_user'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->MyModel->insertData('user',$data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }

//Method Edit
	function edit_service(){
        $id['id_servis'] = $this->input->post('id_servis');
        $data=array(
            'nm_layanan'=>$this->input->post('nm_layanan'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->updateData('servis',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function edit_barang(){
        $id['kd_part'] = $this->input->post('kd_part');
        $data=array(
            'nm_part'=>$this->input->post('nm_part'),
            'stok'=>$this->input->post('stok'),
            'letak_barang'=>$this->input->post('letak'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->updateData('sparepart',$data,$id);
        if ($this->session->userdata('LEVEL') != 'admin'){
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("dashboard");
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("master");
        }
    }
    function edit_pelanggan(){
        $id['kd_pelanggan'] = $this->input->post('kd_pelanggan');
        $data=array(
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->updateData('pelanggan',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function edit_contact(){
        $id['id'] = 1;
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'desc'=>$this->input->post('desc'),
        );
        $this->MyModel->updateData('contact',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function edit_jam(){
        $id['bagian'] = 'jam_operasional';
        $data=array(
            'text1'=> $this->input->post('jadwal1'),
            'text2'=> $this->input->post('jadwal2'),
        );
        $this->MyModel->updateData('setting',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function edit_user(){
        $id['kd_user'] = $this->input->post('kd_user');
        $data=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->MyModel->updateData('user',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }

//Method Delete
	function hapus_service(){
        $id['id_servis'] = $this->uri->segment(3);
        $this->MyModel->deleteData('servis',$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function hapus_barang(){
        $id['kd_part'] = $this->uri->segment(3);
        $this->MyModel->deleteData('sparepart',$id);
        if ($this->session->userdata('LEVEL') != 'admin'){
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("dashboard");
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');
            redirect("master");
        }
    }
    function hapus_pelanggan(){
        $id['kd_pelanggan'] = $this->uri->segment(3);
        $this->MyModel->deleteData('pelanggan',$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function tidak_mengantri(){
        $id['kd_pelanggan'] = $this->uri->segment(3);
        $data=array(
            'ngantri'=>'1',
        );
        $this->MyModel->updateData('pelanggan',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function ngantri(){
        $id['kd_pelanggan'] = $this->uri->segment(3);
        $data=array(
            'ngantri'=>'0',
        );
        $this->MyModel->updateData('pelanggan',$data,$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    function hapus_user(){
        $id['kd_user'] = $this->uri->segment(3);
        $this->MyModel->deleteData('user',$id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
}