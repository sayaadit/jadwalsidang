<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_jadwal_sidang extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function getUser($where,$table){
		return $this->db->get_where($table,$where);
	}

    function getAllJadwalSidang(){
        $this->db->select('* , d1.nama_dosen as penguji1, d2.nama_dosen as penguji2, ');
        $this->db->from('jadwal_sidang');
        $this->db->join('dosen as d1' , 'd1.id_dosen = jadwal_sidang.id_penguji_1');
        $this->db->join('dosen as d2' , 'd2.id_dosen =  jadwal_sidang.id_penguji_2 ');
        $this->db->join('mahasiswa' , 'mahasiswa.id_sidang = jadwal_sidang.id_sidang');

        $query = $this->db->get();
        return $query;
    }

    function updateJadwalSidang($where,$data){
        $this->db->where($where);
        $this->db->update('jadwal_sidang',$data);
    }

    function insertJadwalSidang($data){
        $this->db->insert('jadwal_sidang',$data);
        return $data;
    }

    function deleteJadwalSidang($where){
        $this->db->where($where);
        $this->db->delete('jadwal_sidang');
    }
	
}
