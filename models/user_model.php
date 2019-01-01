<?php
include_once("entities/user.php");
include_once("../config/db.php");

class userModel extends DBConnection
{
	public function __construct() {
		parent::__construct();
	}

	// all user
	public function getAllUsers()
	{
		$result = $this->runQuery('SELECT * FROM users');

		if ($result->num_rows == 0)
		{
			die('No result!');
		}

		$userList = array();
		while ($row = $result->fetch_assoc())
		{
			$user = new User(
				intval($row['id']), 
				$row['pw'], 
				$row['email'], 
				$row['firstname'], 
				$row['lastname'],
				$row['country'],
				$row['county'],
				$row['province'],
				$row['street_address'],
				$row['postcode'],
				$row['tel'],
				$row['facebook'],
				$row['twitter'],
				$row['google']
				)
			);
			array_push($this->userList, $user);
		}

		return $userList;
	}

	// update user
	public function updateUser($id, $user)
	{
		$this->runQuery(
			'UPDATE users 
			SET 
				pw = {$user->getPw()},
				email = {$user->getEmail()},
				firstname = {$user->getFirstname()},
				lastname = {$user->getLastname()},
				country = {$user->getCountry()},
				county = {$user->getCounty()},
				province = {$user->getProvince()},
				street_address = {$user->getStreetAddress()},
				postcode = {$user->getPostcode()},
				tel = {$user->getTel()},
				facebook = {$user->getFacebook()},
				twitter = {$user->getTwitter()},
				google = {$user->getGoogle()}
			WHERE id = $id');
	}

	// insert user
	public function insertUser($user)
	{
		$this->runQuery(
			'INSERT INTO users(id, pw, email, firstname, lastname, country, county, province, street_address, postcode, tel, facebook, twitter, google) 
			VALUE (
				{$user->getId()},
				{$user->getPw()},
				{$user->getEmail()},
				{$user->getFirstname()},
				{$user->getLastname()},
				{$user->getCountry()},
				{$user->getCounty()},
				{$user->getProvince()},
				{$user->getStreetAddress()},
				{$user->getPostcode()},
				{$user->getTel()},
				{$user->getFacebook()},
				{$user->getTwitter()},
				{$user->getGoogle()}
			)'
		);
	}

	// delete user
	public function deleteUser($id)
	{
		$user = $this->getUserInfoById($id);
		if ($user->getId() == 'ADMIN')
		{
			die('Cannot delete this user ADMIN');
		}
		$this->runQuery('DELETE FROM users WHERE id = $id');
	}

	// get info
	public function getUserInfoById($id)
	{
		$result = $this->runQuery('SELECT * FROM users WHERE id = $id');

		if ($result->num_rows == 0)
		{
			die('Cannot retrieve user\'s info (id=$id)!');
		}

		$row = $result->fetch_assoc();
		return new User(
			intval($row['id']), 
				$row['pw'], 
				$row['email'], 
				$row['firstname'], 
				$row['lastname'],
				$row['country'],
				$row['county'],
				$row['province'],
				$row['street_address'],
				$row['postcode'],
				$row['tel'],
				$row['facebook'],
				$row['twitter'],
				$row['google'])
		);
	}
	
}

?>