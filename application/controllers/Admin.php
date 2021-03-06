<?php
  Class Admin extends CI_Controller {
    public function __construct() {
    parent::__construct();
      // Load form helper library
      $this->load->helper('form');
      // Load form validation library
      $this->load->library('form_validation');
      // Load session library
      $this->load->library('session');
      // Load database
      $this->load->model('login_database');
    }

    public function index() {
      $this->load->view('login_form');
    }


    // Check for user login process
    public function user_login_process() {

      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');

      if ($this->form_validation->run() == FALSE) {
        if(isset($this->session->userdata['logged_in'])){
          $this->load->view('admin_page');
        }else{
          $this->load->view('login_form');
        }
      } else {
        $data = array(
          'username' => $this->input->post('username'),
          'password' => $this->input->post('password')
        );
        //auth process in models
        $result = $this->login_database->login($data);
        if ($result == TRUE) {

          $username = $this->input->post('username');
          //get user information using models
          $result = $this->login_database->read_user_information($username);

          if ($result != false) {
            $session_data = array(
              'username' => $result[0]->user_name,
              'email' => $result[0]->user_email,
            );

            // Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            //menampilkan halaman admin
            $this->load->view('admin_page');
          }
        } else {
          $data = array(
            'error_message' => 'Try again, Invalid Username or Password'
          );
          $this->load->view('login_form', $data);
        }
      }
    }

    // Logout from admin page
    public function logout() {

      // Removing session data
      $sess_array = array(
        'username' => ''
      );
      $this->session->unset_userdata('logged_in', $sess_array);
      $data['message_display'] = 'Successfully Logout';
      $this->load->view('login_form', $data);
    }

  }
?>
