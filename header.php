<?php
	ini_set('default_charset','UTF-8');
	include_once "class.php";

	switch ($page) {
		case 'index':
			$title = "Dados Gerais";
			break;
		case 'copas':
			$title = "Copas";
			break;
		case 'resultado':
			$title = "Resultado";
			break;
		case 'pesquisa':
			$title = "Pesquisa";
			break;
		default:
			$title = "Null";
			break;
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title ?> | Copa das Confederações</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<a href="index.php" class="navbar-brand">FIFA Conf. Cup</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="nav-collapse collapse bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li <?php if($page == "index") echo 'class="active"'; ?>>
							<a href="index.php">Dados Gerais</a>
						</li>
						<li <?php if($page == "copas") echo 'class="active"'; ?>>
							<a href="copas.php">Copas</a>
						</li>
						<li <?php if($page == "pesquisa") echo 'class="active"'; ?>>
							<a href="pesquisa.php">Pesquisa</a>
						</li>
						<?php if ($page == "resultado") echo "<li class='active'><a>Resultado</a></li>";?>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">