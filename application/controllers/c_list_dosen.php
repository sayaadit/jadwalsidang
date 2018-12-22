<?php 

/**
* 
*/
class c_list_dosen extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();        
        $this->load->model('m_dosen');
	}

	function index() {
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='admin'){
					$this->viewAllDosen();
				}elseif($this->session->userdata('hak_akses')=='penguji'){
					redirect('c_user/homePenguji');
				}
		}else{
			$this->load->view('Login/LoginUser');
		}
		
	}

	function viewAllDosen(){
		$data['dosen'] = $this->m_dosen->getAllDosen()->result();
		$this->load->view('template/header');
		$this->load->view('admin/view_dosen_penguji', $data);
		$this->load->view('template/footer');
	}

	function edit_dsn($kode_dosen){
		$nama_dosen=$this->input->post('nama_dosen');
		$data=array(
			'nama_dosen'=>$nama_dosen
			);
		$where=array(
			'kode_dosen'=>$kode_dosen
			);
		$this->m_dosen->updateDosen($where,$data);
		redirect(base_url('c_list_dosen/viewAllDosen'));		
	}
	
	function hapus_dsn($kode_dosen){
		$where=array(
            'kode_dosen'=>$kode_dosen
		);
		$this->m_dosen->deleteDosen($where);
		redirect(base_url('c_list_dosen/viewAllDosen'));
	}

	function insert_dsn(){
		$kode_dosen = $this->input->post('kode_dosen');
		$nama_dosen = $this->input->post('nama_dosen');

		$data = array(
			'kode_dosen' => $kode_dosen,
			'nama_dosen' => $nama_dosen
		);

		$this->m_dosen->insertDosen($data);
		redirect(base_url('c_list_dosen/viewAlldosen'));

	}


	
}