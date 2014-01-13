<?php
	$page = "copas";
	include_once 'header.php';
?>

	<div class="page-header">
			<h1>Lista das Copas</h1>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Ano</th>
				<th>País Sede</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
					$coup = new Copa;
					$pais = new Pais;

					if($coup->selecionaTodos())
					{
						while($coup->proximo())
						{
							$paisnome = $pais->getPais($coup->idPaisSede);
							echo "<tr>\n";
							echo "\t<td><a href='resultado.php?search=matches&id=$coup->idCopa'>$coup->idCopa</a></td>\n";
							echo "\t<td><a href='resultado.php?search=matches&id=$coup->idCopa'>$coup->ano</a></td>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$coup->idPaisSede'>$paisnome</a></td>\n";
							echo "</tr>\n";
						}
					}
				?>
			</tr>
		</tbody>
	</table>
	
<?php
	include_once 'footer.php';
	?>