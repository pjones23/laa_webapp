<?php
require_once(APPPATH.'/dal/contact_data_access.php');

class Contact {

	function create($resourceID, $name, $email, $phone, $description) {
		$insertedRows = ContactData::create($resourceID, $name, $email, $phone, $description);
		$success = ($insertedRows == 1) ? true : false;
		return $success;
	}
	
	function read($ID) {
		$contactInfo = ContactData::read($ID);
		if($contactInfo != NULL && count($contactInfo) > 0)
		{
			$contact = NULL;
			$info = $contactInfo[0];

			$ID = $info->ID + 0; // add 0 to make it an integer
			$resourceID = ($info->resourceID != NULL) ? ($info->resourceID + 0) : 0; // add 0 to make it an integer
			$name = ($info->name != NULL) ? $info->name : "";
			$email = ($info->name != NULL) ? $info->name : "";
			$phone = ($info->phone != NULL) ? $info->phone : "";
			$description = ($info->description != NULL) ? $info->description : "";
			$contact = array('ID' => $ID,
				'resourceID' => $resourceID,
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'description' => $description);

			if($contact != NULL) {
				return $contact;
			}
		}
		return NULL;
	}
	
	function readAll() {
		$contactInfo = ContactData::readAll();
		if($contactInfo != NULL)
		{
			$contacts = array();
			foreach ($contactInfo as $info)
			{
			
				$ID = $info->ID + 0; // add 0 to make it an integer
				$resourceID = ($info->resourceID != NULL) ? ($info->resourceID + 0) : 0; // add 0 to make it an integer
				$name = ($info->name != NULL) ? $info->name : "";
				$email = ($info->name != NULL) ? $info->name : "";
				$phone = ($info->phone != NULL) ? $info->phone : "";
				$description = ($info->description != NULL) ? $info->description : "";
				array_push($contacts, array('ID' => $ID,
					'resourceID' => $resourceID,
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'description' => $description));
			}
			if(count($contacts) > 0) {
				return $contacts;
			}
		}
		return NULL;
	}
	
	function readByResourceID($resourceID) {
		$contactInfo = ContactData::readByResourceID($resourceID);
		if($contactInfo != NULL)
		{
			$contacts = array();
			foreach ($contactInfo as $info)
			{
			
				$ID = $info->ID + 0; // add 0 to make it an integer
				$resourceID = ($info->resourceID != NULL) ? ($info->resourceID + 0) : 0; // add 0 to make it an integer
				$name = ($info->name != NULL) ? $info->name : "";
				$email = ($info->name != NULL) ? $info->name : "";
				$phone = ($info->phone != NULL) ? $info->phone : "";
				$description = ($info->description != NULL) ? $info->description : "";
				array_push($contacts, array('ID' => $ID,
					'resourceID' => $resourceID,
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'description' => $description));
			}
			if(count($contacts) > 0) {
				return $contacts;
			}
		}
		return NULL;
	}
	
	function update($ID, $resourceID, $name, $email, $phone, $description) {
		$updatedRows = ContactData::update($ID, $resourceID, $name, $email, $phone, $description);
		$success = ($updatedRows == 1) ? true : false;
		return $success;
	}
	
	function delete($ID) {
		$deletedRows = ContactData::delete($ID);
		$success = ($deletedRows == 1) ? true : false;
		return $success;
	}

}
?>
