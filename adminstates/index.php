<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
	<title>BLOG ADMIN STATISTICS</title>
	<link id="browser_favicon" rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<!--unique visitors count-->
			<div class="alert alert-success">
				<strong><?php 
				require_once('conn.php');
				$sql = "SELECT COUNT(DISTINCT ip_address) AS alias FROM visitor_info";
				$query = $db->prepare($sql);
				$query->execute();
				$unique_visitors = $query->fetch()['alias'];
				echo "TOTAL NUMBER OF UNIQUE VISITORS:".$unique_visitors;

				?></strong>
			</div>