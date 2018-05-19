<?php
class Modeldata extends CI_Model {

  // ambil data
  public function getData() {
    return $this->db->get('user_login');
  }

  // tambah data
  public function addData($data) {
    $this->db->insert('user_login', $data);
  }

}
 ?>
