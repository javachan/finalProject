<?php

class LoginModel extends CI_Model {

	public function validate() {

		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', $this->input->post('password'));

		$query = $this->db->get('users');

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['level'] = $row->level;
				$res['username'] = $row->username;
				return $res;
			}
		}
		else {
			return null;
		}
	}

	public function emailExist() {

		$this->db->where('email', $this->input->post('emailSendKey'));
		$query = $this->db->get('users');
		if($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function keyPresent() {

		$this->db->where('email', $this->input->post('emailSendKey'));
		$query = $this->db->get('forgotPasswordUsers');
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				return $row->hashKey;
			}
		}
		else {
			return null;
		}
	}

	public function addHashKey($key) {

		$data = array(
			'email' => $this->input->post('emailSendKey'),
			'hashKey' => $key
			);

		$query = $this->db->insert('forgotPasswordUsers', $data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function validateHashKey($key) {

		$this->db->where('hashKey', $key);
		$query = $this->db->get('forgotPasswordUsers');

		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteHashKey($key) {

		$this->db->select('email');
		$this->db->where('hashKey', $key);
		$query = $this->db->get('forgotPasswordUsers');
		$val = null;
		foreach ($query->result() as $row)
		{
			$val = $row->email;
		}
		$data = array('password' => $this->input->post('password'));

		$this->db->where('email', $val);
		$query = $this->db->update('users', $data);

		$this->db->where('hashKey', $key);
		$query = $this->db->delete('forgotPasswordUsers');

		if($query) {
			return true;
		} else {
			return false;
		}
	}
}