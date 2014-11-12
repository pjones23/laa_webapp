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
		$this->load->database();
		$this->db->where('ID', $ID);
		$query = $this->db->get('Category');
		$this->db->close();
		return $query->result();
	}
	
	function readAll() {
		$this->load->database();
		$this->db->order_by("name", "asc");
		$query = $this->db->get('Category');
		$this->db->close();
		return $query->result();
	}
	
	function update($ID, $parentCategoryID, $name, $description) {
		$data = array(
               'parentCategoryID' => $parentCategoryID,
               'name' => $name,
               'description' => $description
            );
            
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->update('Category', $data);
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}
	
	function delete($ID) {
		$this->load->database();
		$this->db->where('ID', $ID);
		$this->db->delete('Category');
		$affectRows = $this->db->affected_rows();
		$this->db->close();
		return $affectRows;
	}

}

?>
