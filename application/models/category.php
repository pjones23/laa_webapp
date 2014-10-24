<?php
require_once(APPPATH.'/dal/category_data_access.php');

class Category {

	function create($parentCategoryID, $name, $description) {
	
	}
	
	function read($ID) {
	
	}
	
	function readAll() {
		$categoryInfo = CategoryData::readAll();
		if($categoryInfo != NULL)
		{
			$categories = array();
			foreach ($categoryInfo as $info)
			{
			
				$ID = $info->ID + 0; // add 0 to make it a string
				$parentCategoryID = ($info->parentCategoryID != NULL) ? ($info->parentCategoryID + 0) : 0; // add 0 to make it an int
				$name = ($info->name != NULL) ? $info->name : "";
				$description = ($info->description != NULL) ? $info->description : "";
				array_push($categories, array('ID' => $ID, 'parentCategoryID' => $parentCategoryID, 'name' => $name, 'description' => $description));
			}
			if(count($categories) > 0) {
				return $categories;
			}
		}
		return NULL;
	}
	
	function update($ID, $parentCategoryID, $name, $description) {
	
	}
	
	function delete($ID) {
	
	}

}

?>
