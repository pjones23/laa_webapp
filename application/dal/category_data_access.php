<?php

class CategoryData {

	function create($parentCategoryID, $name, $description) {
	
	}
	
	function read($ID) {
	
	}
	
	function readAll() {
		$categories = array();
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
