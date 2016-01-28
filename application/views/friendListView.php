<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<title>Friends</title>
		<style type="text/css">
			#container {
				width: 1000px;
				margin: 0px auto;
				padding: 10px;
			}
			#header {
				width: 1000px;
				min-height: 20px;
			}
			#route {
				display: inline-block;
				width: 100px;
				padding: 10px;
				float: right;
			}
			#route a {
				display: inline;
				padding: 7px;
			}
			p{
				margin: 20px;
			}
			table td {
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="route">
					<a href="/main/logout">Logout</a>
				</div>
			</div>
			<h4>Hello, <?= $user['alias'] ?>!</h4>
			<p>Here is the list of your friends:</p>
<?php
			if(!$friends) {
				echo "You don't have any friends yet!";
			}
			else {
?>
				<table>
					<thead>
						<tr>
							<td>Alias</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
<?php
						foreach ($friends as $friend) {
?>
						<tr>
							<td><?= $friend['alias'] ?></td>
							<td><a href="/user/<?= $friend['friend_id'] ?>">View Profile</a>  | <a href="/remove/<?= $friend['friend_id'] ?>">Remove as Friend</a></td>
						</tr>
<?php
						}
?>
					</tbody>
				</table>
<?php
			}
?>
			<p>Other Users not on your friend's list:</p>
<?php
			if(!$nonFriends)
				echo "There is no user to be friend with!";
			else {
?>
				<table>
					<thead>
						<tr>
							<td>Alias</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
<?php
						foreach ($nonFriends as $nonFriend) {
?>
						<tr>
							<td><a href="/user/<?= $nonFriend['id'] ?>"><?= $nonFriend['alias'] ?></a></td>
							<td><a href="/main/add/<?= $nonFriend['id'] ?>">Add as Friend</a></td>
						</tr>
<?php
						}
?>
					</tbody>
				</table>
<?php
			}
?>
		</div>
	</body>
</html>