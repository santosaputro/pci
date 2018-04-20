<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Index Page for this models.
 * @author : Santo Saputro
 */

class Mymodel extends CI_Model {

	// Login Methods
	// check login
	function cek_login($where){
		return $this->db->get_where('users', $where);
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "username =" . "'" . $username . "'";

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	// User Methods
	// show user
	public function getUser() {
		return $this->db->get('users');
	}

	// get where user
	public function getWhereUser($key) {
		$this->db->where('id_user', $key);
		return $this->db->get('users');
	}

	// input user
	public function addUser($data) {
		$this->db->insert('users', $data);
	}

	// update user
	public function updateUser($key, $data) {
	 	$this->db->where('id_user', $key);
		$this->db->update('users', $data);
		return $res;
	}

	// delete user
	public function deleteUser($key) {
	 	$this->db->where('id_user',$key);
		$this->db->delete('users');
	}

	// Visi-Misi Methods
	// show visi-misi
	public function getVisi_misi() {
		return $this->db->get('visi_misi');
	}

	// get where visi-misi
	public function getWhereVisi_misi($key) {
		$this->db->where('id_visi_misi', $key);
		return $this->db->get('visi_misi');
	}

	// update visi-misi
	public function updateVisi_misi($key, $data) {
	 	$this->db->where('id_visi_misi', $key);
		$this->db->update('visi_misi', $data);
		return $res;
	}

	// Contact Methods
	// show contact
	public function getContact() {
		return $this->db->get('contacts');
	}

	// get where contact
	public function getWhereContact($key) {
		$this->db->where('id_contact', $key);
		return $this->db->get('contacts');
	}

	// update contact
	public function updateContact($key, $data) {
	 	$this->db->where('id_contact', $key);
		$this->db->update('contacts', $data);
		return $res;
	}

	// paket
	// show
	public function getPaket() {
		return $this->db->get('paket');
	}

	// add upsate
	public function getWherePaket($key) {
		$this->db->where('id_paket', $key);
		return $this->db->get('paket');
	}

	// update
	public function updatePaket($key, $data) {
		$this->db->where('id_paket', $key);
		$this->db->update('paket', $data);
		return $res;
	}

	// save
	public function addPaket($data) {
		$this->db->insert('paket', $data);
	}

	// delete
	public function deletePaket($key) {
		$this->db->where('id_paket', $key);
		$this->db->delete('paket');
	}
}
