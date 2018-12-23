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

	function edit_jdwl($id_sidang){
		$id_dosen_1 = $this->input->post('penguji1');
		$id_dosen_2 = $this->input->post('penguji2');
		$waktu = $this->input->post('waktu');

		$data = array(
			'id_penguji_1' => $id_dosen_1,
			'id_penguji_2' => $id_dosen_2,
			'waktu'=> $waktu
		);

		$where=array(
			'id_sidang'=>$id_sidang
			);

		$this->m_jadwal_sidang->updateJadwalSidang($where,$data);

		redirect(base_url('c_jadwal_sidang/viewAllJadwalSidang'));		
	}
	
	function hapus_jdwl($kode_dosen){
		$where=array(
            'kode_dosen'=>$kode_dosen
		);
		$this->m_dosen->deleteJadwalSidang($where);
		redirect(base_url('c_jadwal_sidang/viewAllJadwalSidang'));
	}

	function insert_jdwl(){
		$id_dosen_1 = $this->input->post('penguji1');
		$id_dosen_2 = $this->input->post('penguji2');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('waktu');

		$data = array(
			'id_penguji_1' => $id_dosen_1,
			'id_penguji_2' => $id_dosen_2,
			'waktu'=> $waktu
		);

		$this->m_jadwal_sidang->insertJadwalSidang($data);

		// get last record to insert in mahasisaw
		$lastRecord = $this->m_jadwal_sidang->getLastRecord();
		//print_r($lastRecord->id_sidang);

		$where = array(
			'nim' => $nim
		);

		$setID = array(
			'id_sidang' => $lastRecord->id_sidang
		);
		$this->m_mahasiswa->updateMahasiswa($where,$setID);

		redirect(base_url('c_jadwal_sidang/viewAllJadwalSidang'));

	}

	
}