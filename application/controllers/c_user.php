<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('m_user');   
        $this->load->model('m_jadwal_sidang');   
        $this->load->model('m_dosen');         
        $this->load->model('m_mahasiswa');         
    }

    function index() {
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='admin'){
					redirect('c_user/homeAdmin');
				}elseif($this->session->userdata('hak_akses')=='penguji'){
					redirect('c_user/homePenguji');
				}
		}else{
			$this->load->view('Login/LoginAdmin');
		}
		
	}

    public function homeAdmin(){
		// $this->load->view('vendor/header_ven');
		//$data['barang'] = $this->m_barang->getAllBarang('barang');
    	$data['jadwal'] = $this->m_jadwal_sidang->getAllJadwalSidang()->result();
		$data['mahasiswa'] = $this->m_mahasiswa->getAllMahasiswa()->result(); 
		$data['dosen'] = $this->m_dosen->getAllDosen()->result();

		$this->load->view('template/header'); // default template
		//$this->load->view('direktur/dashboard',$data); // dashboard vendornya
		$this->load->view('admin/home_dashboard' , $data);
		$this->load->view('template/footer'); 
	}

	public function homePenguji(){
		//$data['barang'] = $this->m_barang->getAllBarang('barang');
		$this->load->view('template/header');
		//$this->load->view('logistik/view_barang',$data);		
		$this->load->view('template/body');
		$this->load->view('template/footer');
	}

	public function kelola_user(){		
		$data['vendor'] = $this->m_vendor->getAllVendor()->result();
		$data['customer'] = $this->m_customer->getAllCustomer()->result();	
		$this->load->view('template/header');
		$this->load->view('logistik/kelola_user',$data);
		$this->load->view('template/footer');	
	}

	//untuk direktur
	public function viewProfil(){
		$where = array('username' => $this->session->userdata('username'));
		$data['profil'] = $this->m_user->getUser($where,'user')->result();	
		$this->load->view('template/header');
		$this->load->view('direktur/profileDirektur',$data);
		$this->load->view('template/footer');		
	}

	//untuk direktur
	function updateProfil(){
			$this->form_validation->set_rules('nama', 'Nama ','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('username', 'Username','required|alpha_numeric_spaces');

			if($this->form_validation->run() == TRUE) {
			$nama=$this->input->post('nama');
			$username=$this->input->post('username');			

			$data=array(
                'nama'=>$nama,
                'username'=>$username              
				);

			$where=array(
			     'username'=>$this->session->userdata('username')
			  );  
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Profil berhasil diubah</div>');
			$this->m_user->updateProfile($where,$data,'user');  			
			$this->viewProfil();
		} else {
			$this->viewProfil();
		}
	}

  	public function view_register() {
    	if (isset($_SESSION['user_id'])) {
      		redirect('c_user');
    	} else {
      		$this->load->view('Login/SignUpAdmin');
    	}
  	}

	function registrasi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$notel = $this->input->post('notel');

		$check_username = $this->m_user->cek_username($username);

		if($check_username->num_rows() > 0 ) {
			?>
                <script type=text/javascript>alert("Username sudah ada");</script>

        	<?php
        	$this->index();
		} else {
			$data = array(
				'username' => $username,
				'password' => md5($password),
				'hak_akses' => 'admin',
				'nama' => $nama,
				'no_hp' => $notel
			);

			$this->m_user->insertUser($data);

			redirect('c_user');
		}
	}

	//untuk logistik
	public function viewProfile(){
		$where = array('username' => $this->session->userdata('username'));
		$data['profil'] = $this->m_user->getUser($where,'user')->result();	
		$this->load->view('template/header');
		$this->load->view('logistik/kelola_profil',$data);
		$this->load->view('template/footer');		
	}

	//untuk logistik
	function updateProfile(){
			$this->form_validation->set_rules('nama', 'Nama ','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('username', 'Username','required|alpha_numeric_spaces');

			if($this->form_validation->run() == TRUE) {
			$nama=$this->input->post('nama');
			$username=$this->input->post('username');			

			$data=array(
                'nama'=>$nama,
                'username'=>$username              
				);

			$where=array(
			     'username'=>$this->session->userdata('username')
			  );  
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Profil berhasil diubah</div>');
			$this->m_user->updateProfile($where,$data,'user');  			
			$this->viewProfile();
		} else {
			$this->viewProfile();
		}
	}

	//untuk logistik
	public function update_password(){
		$this->form_validation->set_rules('curr_password', 'current password','required|alpha_numeric');
		$this->form_validation->set_rules('new_password', 'new password','required|alpha_numeric');
		$this->form_validation->set_rules('conf_password', 'confirm password','required|alpha_numeric');
		if($this->form_validation->run()){
			$curr_password = $this->input->post('curr_password');
			$new_password = $this->input->post('new_password');
			$conf_password = $this->input->post('conf_password');			
			$uname = $this->session->userdata('username');
			$data= $this->m_user->getCurrentpass($uname);					
				if($data->password == ($curr_password)) {			
					if($new_password == $conf_password ){
						if($this->m_user->update_password($new_password, $uname)){						
							?>
	                    		 <script type=text/javascript>alert("update sukses!");</script>
	        				<?php
		        			$this->load->view('template/header');
							$this->viewProfile();							
						}else{						
							?>
	                    		 <script type=text/javascript>alert("Gagal update password!");</script>
	        				<?php	    
							$this->viewProfile();
						}
					}else{
						?>
	                     <script type=text/javascript>alert("password baru dan confirm password tidak cocok!");</script>
	        			<?php
						$this->viewProfile();
					}
				}else{
					?>
                     <script type=text/javascript>alert("password lama yang anda masukan salah!");</script>
        			<?php
					$this->viewProfile();
				}				
		}else{
			$this->load->view('logistik/kelola_profil');
		}
	}
	

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('c_user');
	}

}
