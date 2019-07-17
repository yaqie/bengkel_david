<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Login Gagal / Username atau Password Salah !');
            redirect('');
        };
        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Dashboard',
            'active_dashboard'=>'active',
            'data_barang'=>$this->MyModel->getAllData('sparepart'),
            'kd_part'=>$this->MyModel->getKodeBarang(),
            'kd_pelanggan'=>$this->MyModel->getKodePelanggan(),
            'kd_user'=>$this->MyModel->getKodePengguna(),
			'data_service'=>$this->MyModel->getAllData('servis'),
            'data_pelanggan'=>$this->MyModel->getAllData('pelanggan'),
            'data_pegawai'=>$this->MyModel->getAllData('user'),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_dashboard');
        $this->load->view('element/footer');
    }

}