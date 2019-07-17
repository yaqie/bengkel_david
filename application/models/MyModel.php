<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyModel extends CI_Model{
	//public $table = 'sparepart';
    function __construct(){
        parent::__construct();
    }

    function login($username, $password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //Kode Penjualan
    public function getKodePenjualan(){
        $q = $this->db->query("select MAX(RIGHT(kd_transaksi,3)) as kd_max from transaksi_header");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else{
            $kd = "001";
        }
        return "T-".$kd;
    }

    //Kode Barang
    function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(kd_part,3)) as kd_max from sparepart");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "P-".$kd;
    }

    //Kode Pelanggan
    public function getKodePelanggan(){
		$this->db->select('RIGHT(pelanggan.id_pelanggan,3) as kode', FALSE);
        $this->db->order_by('id_pelanggan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pelanggan');    
        if($query->num_rows() <> 0){            
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {          
         $kode = 1;    
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "P-".$kodemax; 
        return $kodejadi; 
		
    //    $q = $this->db->query("select MAX(RIGHT(kd_pelanggan,3)) as kd_max from pelanggan");
    //    $kd = "";
    //    if($q->num_rows()>0){
    //        foreach($q->result() as $k){
    //            $tmp = ((int)$k->kd_max)+1;
    //            $kd = sprintf("%03s", $tmp);
    //        }
    //    }else{
    //        $kd = "001";
    //    }
    //    return "P-".$kd;
    }

    //Kode User
    public function getKodePengguna(){
        $q = $this->db->query("select MAX(RIGHT(kd_user,3)) as kd_max from user");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "K-".$kd;
    }

    public function getTambahStok($kd_part,$tambah){
        $q = $this->db->query("select stok from sparepart where kd_part='".$kd_part."'");
        $stok = "";
        foreach($q->result() as $d){
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }

    public function getKurangStok($kd_part,$kurangi){
        $q = $this->db->query("select stok from sparepart where kd_part='".$kd_part."'");
        $stok = "";
        foreach($q->result() as $d){
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }

    public function getKembalikanStok($kd_part){
        $q = $this->db->query("select stok from sparepart where kd_part='".$kd_part."'");
        $stok = "";
        foreach($q->result() as $d){
            $stok = $d->stok;
        }
        return $stok;
    }

    public function getAllData($table){
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data){
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key){
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data){
        $this->db->delete($table,$data);
    }

    function insertData($table,$data){
        $this->db->insert($table,$data);
    }

//    function manualQuery($q){
//        return $this->db->query($q);
//    }

    function getBarangJual(){
		$this->db->from('sparepart');
		$this->db->where('stok >','0');
		return $this->db->get()->result();
    //  return $this->db->query ("SELECT * from sparepart where stok > 0")->result();
    }

    function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.kd_transaksi, a.tanggal_penjualan, a.biaya_part, a.id_servis,
			    (select count(kd_transaksi) as jum from transaksi_detail where kd_transaksi=a.kd_transaksi) 
				as jumlah
			    from transaksi_header a
			    ORDER BY a.kd_transaksi DESC")->result();
    }
    
    function getAllDataPersediaanSC(){
        return $this->db->query("SELECT * FROM sparepart")->result();
    }
    
    function getAllDataPPenjualanSp(){
        $tgl1 = date('Y-m-d');
        $tgl2 = date('Y-m-d', strtotime('-7 days', strtotime($tgl1)));
        return $this->db->query("SELECT * FROM `transaksi_header` WHERE biaya_part != 0 AND tanggal_penjualan <= '$tgl1' AND tanggal_penjualan > '$tgl2'")->result();
    }
    function getAllDatajasa_servis(){
        $tgl1 = date('Y-m-d');
        $tgl2 = date('Y-m-d', strtotime('-7 days', strtotime($tgl1)));
        return $this->db->query("SELECT * FROM `transaksi_header` WHERE tanggal_penjualan <= '$tgl1' AND tanggal_penjualan > '$tgl2'")->result();
    }

    function getDataPenjualan($id){		
		$this->db->from('transaksi_header');
		$this->db->join('pelanggan','transaksi_header.kd_pelanggan=pelanggan.kd_pelanggan');
		$this->db->join('user','transaksi_header.kd_user=user.kd_user');
		$this->db->join('servis','transaksi_header.id_servis=servis.id_servis');
		$this->db->where('transaksi_header.kd_transaksi',$id);
		return $this->db->get()->result();
		
    //    return $this->db->query("SELECT * from transaksi_header a
    //            left join pelanggan b on a.kd_pelanggan=b.kd_pelanggan
    //            left join user c on a.kd_user=c.kd_user
    //            left join servis d on a.id_servis=d.id_servis
    //            where a.kd_transaksi = '$id'")->result();
    }

    function getBarangPenjualan($id){
        return $this->db->query("
                select a.kd_part,a.qty,b.nm_part,b.harga
                from transaksi_detail a
                left join sparepart b on a.kd_part=b.kd_part
                where a.kd_transaksi = '$id'")->result();
    }

//    function getLapPenjualan($tgl_awal,$tgl_akhir){
//        return $this->db->query("SELECT *,sum(a.biaya_part) as total_all from transaksi_header a
//                left join pelanggan b on a.kd_pelanggan=b.kd_pelanggan
//                left join user c on a.kd_user=c.kd_user
//                where a.tanggal_penjualan between '$tgl_awal' and '$tgl_akhir'
//                ")->result();
//    }

}