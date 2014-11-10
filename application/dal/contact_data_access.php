<?php

class ContactData {

	function create($resourceID, $name, $email, $phone, $description) {
		$data = array(
               'resourceID' => $resourceID,
               'name' => $name,
               'email' => $email,
               'phone' => $phone,
               'description' => $description
            );
            
		$this->load->database();
		$this->db->insert('Contact', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function read($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$query = $this->db->get('Contact');
		$this->db->close();
		return $query->result();
	}
	
	function readByResourceID($resourceID) {
		$this->load->database();
		$this->db->where('resourceID', $resourceID);
		$query = $this->db->get('Contact');
		$this->db->close();
		return $query->result();
	}
	
	function readAll() {
		$this->load->database();
		$query = $this->db->get('Contact');
		$this->db->close();
		return $query->result();
	}
	
	function update($ID, $resourceID, $name, $email, $phone, $description) {
		$data = array(
               'resourceID' => $resourceID,
               'name' => $name,
               'email' => $email,
               'phone' => $phone,
               'description' => $description
            );
            
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->update('Contact', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function delete($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->delete('Contact');
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
}
?>
