<?php

class UserData {

	function create($firstName, $lastName, $email, $password, $isAdmin) {
		$data = array(
               'firstName' => $firstName,
               'lastName' => $lastName,
               'email' => $email,
               'password' => $password,
               'isAdmin' => $isAdmin + 0
            );
            
		$this->load->database();
		$this->db->insert('User', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function read($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$query = $this->db->get('User');
		$this->db->close();
		return $query->result();
	}
	
	function readAll() {
		$this->load->database();
		$query = $this->db->get('User');
		$this->db->close();
		return $query->result();
	}
	
	function update($ID, $firstName, $lastName, $email) {
		$data = array(
               'firstName' => $firstName,
               'lastName' => $lastName,
               'email' => $email
            );
            
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->update('User', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function delete($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->delete('User');
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function readUserByEmail($email){
		$this->load->database();
		$this->db->where('email', $email);
		$query = $this->db->get('User');
		$this->db->close();
		return $query->result();
	}
	
	function readUserByEmailAndPassword($email, $password){
		$this->load->database();
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('User');
		$this->db->close();
		return $query->result();
	}
}

?>
