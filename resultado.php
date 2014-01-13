<?php
	$page = "resultado";
	include_once 'header.php';
	$typeResult = $_REQUEST["search"];
	if($typeResult == "matches")
	{
		$id= $_REQUEST["id"];
		include_once 'results/matches.php';
	}
	if($typeResult == "pais")
	{
		$id= $_REQUEST["id"];
		include_once 'results/pais.php';
	}
	if($typeResult == "pvp")
	{
		$id1= $_REQUEST["id1"];
		$id2= $_REQUEST["id2"];
		include_once 'results/pvp.php';
	}

?>

<?php
	include_once 'footer.php';
	?>