<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller {

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
        $date = date("Y-m-d");
        $booking = $this->db->query("SELECT * FROM booking WHERE tanggaljambooking >= '$date' AND status = 1")->result();
        $data=array(
            'title'=>'Dashboard',
            'active_dashboard'=>'active',
            'data_booking'=>$booking,
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_booking');
        $this->load->view('element/footer');
    }

    function simpan(){
        $date = date("Y-m-d H:i:s");
        $data=array(
            'nama'=>$this->input->post('nama'),
            'nohp'=>$this->input->post('nohp'),
            'nokendaraan'=>$this->input->post('nokendaraan'),
            'tanggal'=>$this->input->post('date'),
            'jam'=>$this->input->post('jam'),
            'tanggaljambooking'=>$date,
        );

        $this->MyModel->insertData('booking',$data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Booking Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("booking");
    }


    function terima($id){
        $where=array(
            'id_booking'=>$id,
        );
        $data=array(
            'status'=>1,
        );
        $this->MyModel->updateData('booking',$data,$where);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    
    function selesai($id){
        $where=array(
            'id_booking'=>$id,
        );
        $data=array(
            'status'=>2,
        );
        $this->MyModel->updateData('booking',$data,$where);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }
    
    function hapus($id){
        $where=array(
            'id_booking'=>$id,
        );
        $this->MyModel->deleteData('booking',$where);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Hapus Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        redirect("master");
    }

}