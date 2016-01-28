<?php
class Friend extends CI_Model {
	public function displayNonFriendsByUserID($userID) {
		return $this->db->query ("SELECT * FROM users u LEFT JOIN friendships f ON u.id = f.user_id WHERE u.id != $userID")->result_array();
	}
	public function addFriend($user) {
		date_default_timezone_set('America/Los_Angeles');

		$query = "INSERT INTO friendships(user_id, friend_id, created_at, updated_at) VALUES (?,?,?,?)";
		$values = array($user['userID']['id'], $user['friendID'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}
	public function getFriendsByUserID($userID) {
		$query = "SELECT u.alias, u.email, f.friend_id FROM friendships f LEFT JOIN users u ON u.id = f.friend_id WHERE f.user_id = ?";
		$values = $userID;
		return $this->db->query($query, $values)->result_array();
	}
	public function removeFriend($user) {
		$this->db->query ("DELETE FROM friendships WHERE user_id={$user['userID']['id']} AND friend_id={$user['friendID']}");
	}
}