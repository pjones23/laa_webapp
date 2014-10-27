<?php

class UserData {

	function create($firstName, $lastName, $email, $password, $isAdmin, $isLoggedIn) {
		$data = array(
               'firstName' => $firstName,
               'lastName' => $lastName,
               'email' => $email,
               'password' => $password,
               'isAdmin' => $isAdmin,
               'isLoggedIn' => $isLoggedIn
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
	
	function update($ID, $firstName, $lastName, $email, $isAdmin) {	
		$data = array(
               'firstName' => $firstName,
               'lastName' => $lastName,
               'email' => $email,
               'isAdmin' => $isAdmin,
               'isLoggedIn' => FALSE
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
}

?>
