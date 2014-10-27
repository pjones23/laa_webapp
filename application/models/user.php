<?php
require_once(APPPATH.'/dal/user_data_access.php');

class User {

	function create($firstName, $lastName, $email, $password, $isAdmin) {
		$securePassword = encryptPassword($password);
		$insertedRows = UserData::create($firstName, $lastName, $email, $securePassword, $isAdmin);
		$success = ($insertedRows == 1) ? true : false;
		return $success;
	}
	
	function read($ID) {
		$userInfo = UserData::read($ID);
		if($userInfo != NULL && count($userInfo) > 0)
		{
			$user = NULL;
			$info = $userInfo[0];

			$ID = $info->ID + 0; // add 0 to make it an integer
			$firstName = ($info->firstName != NULL) ? $info->firstName : "";
			$lastName = ($info->lastName != NULL) ? $info->lastName : "";
			$email = ($info->email != NULL) ? $info->email : "";
			$isAdmin = ($info->isAdmin != NULL) ? $info->isAdmin : FALSE;
			$user = array('ID' => $ID,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'email' => $email,
				'isAdmin' => $isAdmin);

			if($user != NULL) {
				return $user;
			}
		}
		return NULL;
	}
	
	function readAll() {
		$userInfo = UserData::readAll();
		if($userInfo != NULL)
		{
			$users = array();
			foreach ($userInfo as $info)
			{
			
				$ID = $info->ID + 0; // add 0 to make it an integer
				$firstName = ($info->firstName != NULL) ? $info->firstName : "";
				$lastName = ($info->lastName != NULL) ? $info->lastName : "";
				$email = ($info->email != NULL) ? $info->email : "";
				$isAdmin = ($info->isAdmin != NULL) ? $info->isAdmin : FALSE;
				array_push($users, array('ID' => $ID,
					'firstName' => $firstName,
					'lastName' => $lastName,
					'email' => $email,
					'isAdmin' => $isAdmin));
			}
			if(count($users) > 0) {
				return $users;
			}
		}
		return NULL;
	}
	
	function update($ID, $firstName, $lastName, $email, $isAdmin, $isLoggedIn) {
		$updatedRows = UserData::update($ID, $firstName, $lastName, $email, $isAdmin, $isLoggedIn);
		$success = ($updatedRows == 1) ? true : false;
		return $success;
	}
	
	function delete($ID) {
		$deletedRows = UserData::delete($ID);
		$success = ($deletedRows == 1) ? true : false;
		return $success;
	}

	function encryptPassword($password) {
		$key = "xqH2VSXmU9esrfD9xKiOam54sk5ydswI";
		$encryptedPassword = trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $password, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
		return $encryptedPassword;
	}

}

?>
