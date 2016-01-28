<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?= $user['alias'] ?></title>
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
			h3, p {
				margin: 20px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="route">
					<a href="/friends">Home</a>
					<a href="/main/logout">Logout</a>
				</div>
				<h3><?= $alias ?>'s Profile</h3>
				<p>Name: <?= $name ?></p><br />
				<p>Email Address: <?= $email ?></p>
			</div>
		</div>
	</body>
</html>