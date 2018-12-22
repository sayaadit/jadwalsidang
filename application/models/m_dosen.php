<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dosen extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function getUser($where,$table){
		return $this->db->get_where($table,$where);
	}

    function getAllDosen(){
         return $this->db->get('dosen');
        
    }

    function updateDosen($where,$data){
        $this->db->where($where);
        $this->db->update('dosen',$data);
    }

    function insertDosen($data){
        $this->db->insert('dosen',$data);
        return $data;
    }

    function deleteDosen($where){
        $this->db->where($where);
        $this->db->delete('dosen');
    }
	
}
