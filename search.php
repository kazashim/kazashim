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
	<meta name="keywords" content="<?php getkeywords("titles");?>" />