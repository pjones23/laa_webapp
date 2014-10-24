<?php

class CategoryData {

	function create($parentCategoryID, $name, $description) {
	
		$data = array(
               'parentCategoryID' => $parentCategoryID,
               'name' => $name,
               'description' => $description
            );
            
		$this->load->database();
		$this->db->insert('Category', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function read($ID) {
	
	}
	
	function readAll() {
		$this->load->database();
		$query = $this->db->get('Category');
		$this->db->close();
		return $query->result();
	}
	
	function update($ID, $parentCategoryID, $name, $description) {
	
	}
	
	function delete($ID) {
	
	}

}

?>
