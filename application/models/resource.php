<?php
require_once(APPPATH.'/dal/resource_data_access.php');

class Resource {

	function create($categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website) {
		$insertedRows = ResourceData::create($categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website);
		$success = ($insertedRows == 1) ? true : false;
		return $success;
	}
	
	function read($ID) {
		$resourceInfo = ResourceData::read($ID);
		if($resourceInfo != NULL && count($resourceInfo) > 0)
		{
			$resource = NULL;
			$info = $resourceInfo[0];

			$ID = $info->ID + 0; // add 0 to make it an integer
			$categoryID = $info->categoryID + 0; // add 0 to make it an integer
			$name = ($info->name != NULL) ? $info->name : "";
			$phone = ($info->phone != NULL) ? $info->phone : "";
			$email = ($info->email != NULL) ? $info->email : "";
			$address = ($info->address != NULL) ? $info->address : "";
			$city = ($info->city != NULL) ? $info->city : "";
			$state = ($info->state != NULL) ? $info->state : "";
			$zip = ($info->zip != NULL) ? $info->zip : "";
			$description = ($info->description != NULL) ? $info->description : "";
			$serviceHours = ($info->serviceHours != NULL) ? $info->serviceHours : "";
			$eligibility = ($info->eligibility != NULL) ? $info->eligibility : "";
			$intakeProcedure = ($info->intakeProcedure != NULL) ? $info->intakeProcedure : "";
			$documents = ($info->documents != NULL) ? $info->documents : "";
			$fees = ($info->fees != NULL) ? $info->fees : "";
			$languages = ($info->languages != NULL) ? $info->languages : "";
			$services = ($info->services != NULL) ? $info->services : "";
			$website = ($info->website != NULL) ? $info->website : "";
			$resource = array('ID' => $ID, 'categoryID' => $categoryID,
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
               'website' => $website);

			if($resource != NULL) {
				return $resource;
			}
		}
		return NULL;
	}
	
	function readAll() {
		$userInfo = ResourceData::readAll();
		if($userInfo != NULL)
		{
			$users = array();
			foreach ($userInfo as $info)
			{
			
				$ID = $info->ID + 0; // add 0 to make it an integer
				$categoryID = $info->categoryID + 0; // add 0 to make it an integer
				$name = ($info->name != NULL) ? $info->name : "";
				$phone = ($info->phone != NULL) ? $info->phone : "";
				$email = ($info->email != NULL) ? $info->email : "";
				$address = ($info->address != NULL) ? $info->address : "";
				$city = ($info->city != NULL) ? $info->city : "";
				$state = ($info->state != NULL) ? $info->state : "";
				$zip = ($info->zip != NULL) ? $info->zip : "";
				$description = ($info->description != NULL) ? $info->description : "";
				$serviceHours = ($info->serviceHours != NULL) ? $info->serviceHours : "";
				$eligibility = ($info->eligibility != NULL) ? $info->eligibility : "";
				$intakeProcedure = ($info->intakeProcedure != NULL) ? $info->intakeProcedure : "";
				$documents = ($info->documents != NULL) ? $info->documents : "";
				$fees = ($info->fees != NULL) ? $info->fees : "";
				$languages = ($info->languages != NULL) ? $info->languages : "";
				$services = ($info->services != NULL) ? $info->services : "";
				$website = ($info->website != NULL) ? $info->website : "";
				array_push($users, array('ID' => $ID, 'categoryID' => $categoryID,
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
	               'website' => $website));
			}
			if(count($users) > 0) {
				return $users;
			}
		}
		return NULL;
	}
	
	function update($ID, $categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website) {
		$updatedRows = ResourceData::update($ID, $categoryID, $name, $phone, $email, $address, $city, $state, $zip, $description, $serviceHours, $eligibility, $intakeProcedure, $documents, $fees, $languages, $services, $website);
		$success = ($updatedRows == 1) ? true : false;
		return $success;
	}
	
	function delete($ID) {
		$deletedRows = ResourceData::delete($ID);
		$success = ($deletedRows == 1) ? true : false;
		return $success;
	}
	
	function readAllByCategory($categoryID) {
		$userInfo = ResourceData::readByCategory($categoryID);
		if($userInfo != NULL)
		{
			$users = array();
			foreach ($userInfo as $info)
			{
				$ID = $info->ID + 0; // add 0 to make it an integer
				$categoryID = $info->categoryID + 0; // add 0 to make it an integer
				$name = ($info->name != NULL) ? $info->name : "";
				$phone = ($info->phone != NULL) ? $info->phone : "";
				$email = ($info->email != NULL) ? $info->email : "";
				$address = ($info->address != NULL) ? $info->address : "";
				$city = ($info->city != NULL) ? $info->city : "";
				$state = ($info->state != NULL) ? $info->state : "";
				$zip = ($info->zip != NULL) ? $info->zip : "";
				$description = ($info->description != NULL) ? $info->description : "";
				$serviceHours = ($info->serviceHours != NULL) ? $info->serviceHours : "";
				$eligibility = ($info->eligibility != NULL) ? $info->eligibility : "";
				$intakeProcedure = ($info->intakeProcedure != NULL) ? $info->intakeProcedure : "";
				$documents = ($info->documents != NULL) ? $info->documents : "";
				$fees = ($info->fees != NULL) ? $info->fees : "";
				$languages = ($info->languages != NULL) ? $info->languages : "";
				$services = ($info->services != NULL) ? $info->services : "";
				$website = ($info->website != NULL) ? $info->website : "";
				array_push($users, array('ID' => $ID, 'categoryID' => $categoryID,
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
	               'website' => $website));
			}
			if(count($users) > 0) {
				return $users;
			}
		}
		return NULL;
	}

}

?>