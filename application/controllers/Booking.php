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
        $this->load->view('pages/v_booking2',$data);
        $this->load->view('pages/footer',$data);
    }

    // function index(){
    //     $date = date("Y-m-d");
    //     $booking = $this->db->query("SELECT * FROM booking WHERE tanggaljambooking >= '$date' AND status = 1")->result();
    //     $data=array(
    //         'title'=>'Dashboard',
    //         'active_dashboard'=>'active',
    //         'data_booking'=>$booking,
    //     );
    //     $this->load->view('element/header',$data);
    //     $this->load->view('pages/v_booking2');
    //     $this->load->view('element/footer');
    // }

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
        redirect(base_url('list_antrian'));
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
        $this->session->set_flashdata('tabmaster', 'booking');
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
        $this->session->set_flashdata('tabmaster', 'booking');
        redirect("master");
    }
    
    function tolak($id){
        $where=array(
            'id_booking'=>$id,
        );
        $data=array(
            'status'=>-1,
        );
        $this->MyModel->updateData('booking',$data,$where);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan Berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        $this->session->set_flashdata('tabmaster', 'booking');
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
        $this->session->set_flashdata('tabmaster', 'booking');
        redirect("master");
    }

}