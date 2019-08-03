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

    function persediaan_suku_cadang($tgl1 = '',$tgl2 =''){
        
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
    
    
    function penjualan_sparepart($tgl1 = '',$tgl2 =''){
        if ($tgl1 != '' && $tgl2 != '') {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'penjualan_sparepart'=>$this->MyModel->getAllDataPPenjualanSpTgl($tgl1,$tgl2)
            );
        } else {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'penjualan_sparepart'=>$this->MyModel->getAllDataPPenjualanSp()
            );
        }
        
        $this->load->view('element/header',$data);
        $this->load->view('laporan/penjualan_sparepart');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }

    function penjualan_sparepart_tgl(){
        $tgl1 = $this->input->post('date1');
        $tgl2 = $this->input->post('date2');
        redirect(base_url('laporan/penjualan_sparepart/'.$tgl1."/".$tgl2));
    }






    function pembelian_sparepart($tgl1 = '',$tgl2 =''){
        if ($tgl1 != '' && $tgl2 != '') {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'pembelian_sparepart'=>$this->MyModel->getAllDataPPembelianSpTgl($tgl1,$tgl2)
            );
        } else {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'pembelian_sparepart'=>$this->MyModel->getAllDataPPembelianSp()
            );
        }
        
        $this->load->view('element/header',$data);
        $this->load->view('laporan/pembelian_sparepart');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }

    function pembelian_sparepart_tgl(){
        $tgl1 = $this->input->post('date1');
        $tgl2 = $this->input->post('date2');
        redirect(base_url('laporan/pembelian_sparepart/'.$tgl1."/".$tgl2));
    }
    
    function jasa_servis($tgl1 = '',$tgl2 =''){
        

        if ($tgl1 != '' && $tgl2 != '') {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'jasa_servis'=>$this->MyModel->getAllDatajasa_servisTgl($tgl1,$tgl2)
            );
        } else {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'jasa_servis'=>$this->MyModel->getAllDatajasa_servis()
            );
        }


        $this->load->view('element/header',$data);
        $this->load->view('laporan/jasa_servis');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function jasa_servis_tgl(){
        $tgl1 = $this->input->post('date1');
        $tgl2 = $this->input->post('date2');
        redirect(base_url('laporan/jasa_servis/'.$tgl1."/".$tgl2));
    }

    function pendapatan($tgl1 = '',$tgl2 =''){
        if ($tgl1 != '' && $tgl2 != '') {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'pendapatan'=>$this->MyModel->getAllDatajasa_servisTgl($tgl1,$tgl2)
            );
        } else {
            $data=array(
                'title'=>'Transaksi',
                'active_penjualan'=>'active',
                'pendapatan'=>$this->MyModel->getAllDatajasa_servis()
            );
        }
        $this->load->view('element/header',$data);
        $this->load->view('laporan/pendapatan');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        

    }

    function pendapatan_tgl(){
        $tgl1 = $this->input->post('date1');
        $tgl2 = $this->input->post('date2');
        redirect(base_url('laporan/pendapatan/'.$tgl1."/".$tgl2));
    }

}