<?php 
/**
* 
*/
class C_login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function verify_login()
	{
        if(isset($_POST['submit'])){
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil=  $this->M_login->login($username,$password);
            if($hasil==1)
            {
                $sess_data = array(
                'logged_in' => "Sudah Login",
                'username' => $login->username,
                'level' => "Admin"
            );
            $this->session->set_userdata($sess_data);
            redirect('C_home/index');
            }
            else{
                redirect('C_login/index');
            }
        }
        else{
            chek_session_login();
            $this->load->view('login');
        }
	}
}
?>