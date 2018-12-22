<?php 

/**
* 
*/
class c_list_mahasiswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();        
        $this->load->model('m_mahasiswa');
	}

	function index() {
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='admin'){
					$this->viewAllMahasiswa();
				}elseif($this->session->userdata('hak_akses')=='penguji'){
					redirect('c_user/homePenguji');
				}
		}else{
			$this->load->view('Login/LoginUser');
		}
		
	}

	function viewAllMahasiswa(){
		$data['mahasiswa'] = $this->m_mahasiswa->getAllMahasiswa()->result();
		$this->load->view('template/header');
		$this->load->view('admin/view_mahasiswa', $data);
		$this->load->view('template/footer');
	}

	function edit_mhs($nim){
		$nama=$this->input->post('nama_baru');
		$data=array(
			'nama'=>$nama
			);
		$where=array(
			'nim'=>$nim
			);
		$this->m_mahasiswa->updateMahasiswa($where,$data);
		redirect(base_url('c_list_mahasiswa/viewAllMahasiswa'));		
	}
	
	function hapus_mhs($nim){
		$where=array(
            'nim'=>$nim
		);
		$this->m_mahasiswa->deleteMahasiswa($where);
		redirect(base_url('c_list_mahasiswa/viewAllMahasiswa'));
	}

	function insert_mhs(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');

		$data = array(
			'nim' => $nim,
			'nama' => $nama
		);

		$this->m_mahasiswa->insertMahasiswa($data);
		redirect(base_url('c_list_mahasiswa/viewAllMahasiswa'));

	}

}