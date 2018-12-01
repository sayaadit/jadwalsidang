<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('m_user');               
    }

    public function homeAdmin(){
		// $this->load->view('vendor/header_ven');
		//$data['barang'] = $this->m_barang->getAllBarang('barang');
		$this->load->view('template/header'); // default template
		$this->load->view('direktur/dashboard',$data); // dashboard vendornya
		$this->load->view('template/footer'); 
	}

	public function homePenguji(){
		//$data['barang'] = $this->m_barang->getAllBarang('barang');
		$this->load->view('template/header');
		$this->load->view('logistik/view_barang',$data);		
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
	//untuk direktur
	public function update_password_direktur(){
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
							$this->viewProfil();							
						}else{						
							?>
	                    		 <script type=text/javascript>alert("Gagal update password!");</script>
	        				<?php	    
							$this->viewProfil();
						}
					}else{
						?>
	                     <script type=text/javascript>alert("password baru dan confirm password tidak cocok!");</script>
	        			<?php
						$this->viewProfil();
					}
				}else{
					?>
                     <script type=text/javascript>alert("password lama yang anda masukan salah!");</script>
        			<?php
					$this->viewProfil();
				}				
		}else{
			$this->load->view('direktur/kelola_profil');
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
		redirect('Home');
	}

}
