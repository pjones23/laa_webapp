<?php
require_once(APPPATH.'/dal/category_data_access.php');

class Category {

	function create($parentCategoryID, $name, $description) {
		$insertedRows = CategoryData::create($parentCategoryID, $name, $description);
		$success = ($insertedRows == 1) ? true : false;
		return $success;
	}
	
	function read($ID) {
		$categoryInfo = CategoryData::read($ID);
		if($categoryInfo != NULL && count($categoryInfo) > 0)
		{
			$category = NULL;
			$info = $categoryInfo[0];

			$ID = $info->ID + 0; // add 0 to make it a string
			$parentCategoryID = ($info->parentCategoryID != NULL) ? ($info->parentCategoryID + 0) : 0; // add 0 to make it an int
			$name = ($info->name != NULL) ? $info->name : "";
			$description = ($info->description != NULL) ? $info->description : "";
			$category = array('ID' => $ID, 'parentCategoryID' => $parentCategoryID, 'name' => $name, 'description' => $description );

			if($category != NULL) {
				return $category;
			}
		}
		return NULL;
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
		$updatedRows = CategoryData::update($ID, $parentCategoryID, $name, $description);
		$success = ($updatedRows == 1) ? true : false;
		return $success;
	}
	
	function delete($ID) {
		$deletedRows = CategoryData::delete($ID);
		$success = ($deletedRows == 1) ? true : false;
		return $success;
	}

}

?>
