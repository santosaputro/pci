<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Protect extends CI_Controller {

	/**
	 * Index Page for controller Login.
	 * Author : Santo Saputro
	 * copyright 2018-2021 psycodev
	 * visit :http://psycodev.com
	 *
	 */

  	function __construct() {
    	parent::__construct();
  	}

	public function index() {
    if($this->session->userdata('status') == "login"){
      redirect('dashboard');
    } else {
      $this->load->view('theme/login');
    }
	}

  public function login() {

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->mymodel->cek_login($where)->num_rows();
		if($cek > 0) {
			$result 	= $this->mymodel->read_user_information($username);
			if ($result != false) {
				$data_session = array(
					'username' 	=> $result[0]->username,
					'name' 		  => $result[0]->name,
  				'status'    => "login"
					);
        $this->session->set_userdata($data_session);
        $this->session->set_flashdata('success_message', 'Selamat Datang di dashboard');
  			redirect('dashboard');
			}

		} else {
			$this->session->set_flashdata('error_message', 'Invalid Username or Password');
			redirect('user/protect');
		}

	}

  function logout() {
    $this->session->sess_destroy();
    $data['logout_message'] = 'Successfully Logout';
  	$this->load->view('theme/login', $data);
	}

}
