<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function landing(){
        $jamoperasional = $this->db->get_where('setting', array('bagian' => 'jam_operasional'))->row();
        $antrian = $this->db->get_where('pelanggan', array('ngantri' => '1'))->num_rows();
        $data=array(
            'jamoperasional'=>$jamoperasional,
            'antrian'=>$antrian,
            'title'=>'Landing',
            'active_dashboard'=>'active',
            'dt_contact'=>$this->MyModel->getAllData('contact'),
            'persediaan_suku_cadang'=>$this->MyModel->getAllDataPersediaanSC()
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_landing',$data);
        $this->load->view('element/footer',$data);
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('pages/v_login',$data);
    }

    function cek_login() {
        //validasi inputan dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query database
        $result = $this->MyModel->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //membuat session
                $sess_array = array(
                    'ID' => $row->kd_user,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'NAME'=>$row->nama,
                    'LEVEL' => $row->level,
                    'login_status'=>true,
                );
                //set session dengan value dari database
                $this->session->set_userdata($sess_array);
                redirect('dashboard','refresh');
            }
            return TRUE;
        } else {
            //jika validasi salah
            redirect('dashboard','refresh');
            return FALSE;
        }
    }

    function logout() {
        //hapus data session
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}