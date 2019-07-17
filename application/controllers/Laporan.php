<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function persediaan_suku_cadang(){
        $data=array(
            'title'=>'Transaksi',
            'active_penjualan'=>'active',
            'persediaan_suku_cadang'=>$this->MyModel->getAllDataPersediaanSC()
        );
        $this->load->view('element/header',$data);
        $this->load->view('laporan/suku_cadang');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }
    
    
    function penjualan_sparepart(){
        $data=array(
            'title'=>'Transaksi',
            'active_penjualan'=>'active',
            'penjualan_sparepart'=>$this->MyModel->getAllDataPPenjualanSp()
        );
        $this->load->view('element/header',$data);
        $this->load->view('laporan/penjualan_sparepart');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }
    
    function jasa_servis(){
        $data=array(
            'title'=>'Transaksi',
            'active_penjualan'=>'active',
            'jasa_servis'=>$this->MyModel->getAllDatajasa_servis()
        );
        $this->load->view('element/header',$data);
        $this->load->view('laporan/jasa_servis');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }
    function pendapatan(){
        $data=array(
            'title'=>'Transaksi',
            'active_penjualan'=>'active',
            'pendapatan'=>$this->MyModel->getAllDatajasa_servis()
        );
        $this->load->view('element/header',$data);
        $this->load->view('laporan/pendapatan');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }

}