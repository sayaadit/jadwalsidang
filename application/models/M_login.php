<?php
/**
*
*/
class M_login extends CI_Model
{

	function login($data)
    {
        $this->db->where('username',$data['username']);
        $this->db->where('password',$data['password']);

        $result = $this->db->get('admin');
				if($result->num_rows()==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
}
