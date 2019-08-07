<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suku_cadang extends CI_Controller {

    function __construct(){
        parent::__construct();
        // if($this->session->userdata('login_status') != TRUE ){
        //     $this->session->set_flashdata('notif','Login Gagal / Username atau Password Salah !');
        //     redirect('');
        // };
        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $jamoperasional = $this->db->get_where('setting', array('bagian' => 'jam_operasional'))->row();
        $contact = $this->db->get('contact')->row();
        $antrian = $this->db->get_where('pelanggan', array('ngantri' => '1'))->num_rows();
        $date = date("Y-m-d");
        $booking = $this->db->query("SELECT * FROM booking WHERE tanggaljambooking >= '$date' AND status = 1")->result();
        $data=array(
            'jamoperasional'=>$jamoperasional,
            'antrian'=>$antrian,
            'title'=>'Landing',
            'active_dashboard'=>'active',
            'dt_contact'=>$contact,
            'data_booking'=>$booking,
            'persediaan_suku_cadang'=>$this->MyModel->getAllDataPersediaanSC()
        );
        $this->load->view('pages/header',$data);
        $this->load->view('pages/v_suku_cadang',$data);
        $this->load->view('pages/footer',$data);
    }

}