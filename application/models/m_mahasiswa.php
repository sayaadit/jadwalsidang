<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_mahasiswa extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function getUser($where,$table){
		return $this->db->get_where($table,$where);
	}

    function getAllMahasiswa(){
         return $this->db->get('mahasiswa');
        
    }

    function updateMahasiswa($where,$data){
        $this->db->where($where);
        $this->db->update('mahasiswa',$data);
    }

    function insertMahasiswa($data){
        $this->db->insert('mahasiswa',$data);
        return $data;
    }

    function deleteMahasiswa($where){
        $this->db->where($where);
        $this->db->delete('mahasiswa');
    }
	
}
