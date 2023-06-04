<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strProductID"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";

	header("location:show.php");
?>