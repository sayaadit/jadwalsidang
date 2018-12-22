<?php 

/**
* 
*/
class c_jadwal_sidang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();        
        $this->load->model('m_jadwal_sidang');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
	}

	function index() {
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='admin'){
					$this->viewAllJadwalSidang();
				}elseif($this->session->userdata('hak_akses')=='penguji'){
					redirect('c_user/homePenguji');
				}
		}else{
			$this->load->view('Login/LoginUser');
		}
		
	}

	function viewAllJadwalSidang(){
		$data['jadwal'] = $this->m_jadwal_sidang->getAllJadwalSidang()->result();
		$data['mahasiswa'] = $this->m_mahasiswa->getAllMahasiswa()->result(); 
		$data['dosen'] = $this->m_dosen->getAllDosen()->result();
		//print_r($data['jadwal']);
		$this->load->view('template/header');
		$this->load->view('admin/view_jadwal_sidang', $data);
		$this->load->view('template/footer');
	}

	function edit_jdwl($kode_dosen){
		$nama_dosen=$this->input->post('nama_dosen');
		$data=array(
			'nama_dosen'=>$nama_dosen
			);
		$where=array(
			'kode_dosen'=>$kode_dosen
			);
		$this->m_dosen->updateJadwalSidang($where,$data);
		redirect(base_url('c_list_dosen/viewAllJadwalSidang'));		
	}
	
	function hapus_jdwl($kode_dosen){
		$where=array(
            'kode_dosen'=>$kode_dosen
		);
		$this->m_dosen->deleteJadwalSidang($where);
		redirect(base_url('c_list_dosen/viewAllJadwalSidang'));
	}

	function insert_jdwl(){
		$kode_dosen = $this->input->post('kode_dosen');
		$nama_dosen = $this->input->post('nama_dosen');

		$data = array(
			'kode_dosen' => $kode_dosen,
			'nama_dosen' => $nama_dosen
		);

		$this->m_dosen->insertJadwalSidang($data);
		redirect(base_url('c_list_dosen/viewAlldosen'));

	}

	
}