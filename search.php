<?php require("libs/fetch_data.php");?>
<?php
define("ROW_PER_PAGE",6);
require_once('database/db.php');//db config file
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Search|<?php getwebname("titles"); echo"|"; gettagline("titles");?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link id="browser_favicon" rel="shortcut icon" href="blogadmin/images/<?php geticon("titles"); ?>">
	<meta charset="utf-8" name="description" content="<?php getshortdescription("titles");?>">
	<meta name="keywords" content="<?php getkeywords("titles");?>" /><script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/single.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>
<body>
	<!--Header-->
	<?php include("header.php");?>
	<!--//header-->
	<?php	
    $search_keyword = '';
    if(!empty($_POST['search']['keyword'])) {
    	$search_keyword = $_POST['search']['keyword'];
    }
    $sql = 'SELECT * FROM blogs WHERE title LIKE :keyword OR content LIKE :keyword  OR tags LIKE :keyword OR author LIKE :keyword ORDER BY id DESC ';
    
    /* Pagination Code starts */
    $per_page_html = '';
    $page = 1;
    $start=0;
    if(!empty($_POST["page"])) {
    	$page = $_POST["page"];
    	$start=($page-1) * ROW_PER_PAGE;
    }
    $limit=" limit " . $start . "," . ROW_PER_PAGE;
    $pagination_statement = $pdo_conn->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->execute();