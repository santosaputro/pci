<?php
  Class Testcontroller extends CI_Controller {

    public function index() {
      $data['tabelData']  = $this->modeldata->getData()->result();

      $this->load->view('index-data', $data);
    }

    public function tambahData() {
      $this->load->view('tambah-data');
    }

    public function simpanData() {
      $data = array(
        'user_name'     => $this->input->post('user_name'),
        'user_email'    => $this->input->post('user_email'),
        'user_password' => $this->input->post('user_password')
      );

      $this->modeldata->addData($data);
      $this->session->set_flashdata('info', 'SUCCESS! data berhasil ditambahkan');
      redirect('testcontroller/index');
    }

  }
?>
