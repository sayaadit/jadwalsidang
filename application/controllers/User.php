<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->helper(array('url'));
    // $this->load->model('user_model');
    // $this->load->model('todo_model');
  }
  public function index() {
    if (isset($_SESSION['user_id'])) {
      redirect('/user/view_home');
    } else {
      redirect('/user/view_login');
    }
  }

  public function view_register() {
    if (isset($_SESSION['user_id'])) {
      redirect('/user/view_home');
    } else {
      $this->load->view('Login/SignUpAdmin');
    }
  }

  public function view_login() {
    if (isset($_SESSION['user_id'])) {
      redirect('/user/view_home');
    } else {
      $this->load->view('Login/LoginAdmin');
    }
  }

  public function view_home() {
    if (isset($_SESSION['user_id'])) {

      $todos = new stdClass();
      $todos->data = $this->todo_model->get_user_todo ($_SESSION['user_id']) ->result();


      $this->load->view('user/header');
      $this->load->view('user/sidebar');
      $this->load->view('user/home/home', $todos);
      $this->load->view('user/footer');

    } else {
      redirect('/user/view_login');
    }
  }
}
?>
