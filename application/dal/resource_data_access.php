<?php

class ResourceData {

	function create($categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website) {
		$data = array(
               'categoryID' => $categoryID,
               'name' => $name,
               'phone' => $phone,
               'email' => $email,
               'address' => $address,
               'city' => $city,
               'state' => $state,
               'zip' => $zip,
               'description' => $description,
               'serviceHours' => $serviceHours,
               'eligibility' => $eligibility,
               'intakeProcedure' => $intakeProcedure,
               'documents' => $documents,
               'fees' => $fees,
               'languages' => $languages,
               'services' => $services,
               'website' => $website
            );
            
		$this->load->database();
		$this->db->insert('Resource', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function read($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$query = $this->db->get('Resource');
		$this->db->close();
		return $query->result();
	}
	
	function readAll() {
		$this->load->database();
		$query = $this->db->get('Resource');
		$this->db->close();
		return $query->result();
	}
	
	function update($ID, $categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website) {	
		$data = array(
               'categoryID' => $categoryID,
               'name' => $name,
               'phone' => $phone,
               'email' => $email,
               'address' => $address,
               'city' => $city,
               'state' => $state,
               'zip' => $zip,
               'description' => $description,
               'serviceHours' => $serviceHours,
               'eligibility' => $eligibility,
               'intakeProcedure' => $intakeProcedure,
               'documents' => $documents,
               'fees' => $fees,
               'languages' => $languages,
               'services' => $services,
               'website' => $website
            );
            
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->update('Resource', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function delete($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->delete('Resource');
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function readByCategory($categoryID) {
		$this->load->database();
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get('Resource');
		$this->db->close();
		return $query->result();
	}
}

?>