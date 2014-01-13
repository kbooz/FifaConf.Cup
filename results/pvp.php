<?php
	$pais = new Pais;
	$paisA = $pais->getPais($id1);
	if($id2!=0)
		$paisB = $pais->getPais($id2);
	else
		$paisB = "Todos os Paises";
	?>
</br>

</br>
<div align="center"><h1><?php echo $paisA;?> versus <?php echo $paisB;?></div>
</br>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Pais A</th>
				<th></th>
				<th></th>
				<th></th>
				<th>Pais B</th>
				<th>Ano</th>
				<th>País Sede</th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$temp = new Temporario;
					

					if($temp->selecionaTodos($id1,$id2))
					{
						while($temp->proximo())
						{
							
							$paisA = $pais->getPais($temp->idPaisVitoria);
							$paisB = $pais->getPais($temp->idPaisDerrota);
							$paisS = $pais->getPais($temp->idPaisSede);
							if($temp->bitFinal == 1)
								echo "<tr class='success'>\n";
							else
								echo "<tr>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$temp->idPaisVitoria'>$paisA</a></td>\n";
							echo "\t<td>$temp->resultadoVitoria</td>\n";
							echo "\t<td>x</td>\n";
							echo "\t<td>$temp->resultadoDerrota</td>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$temp->idPaisDerrota'>$paisB</a></td>\n";
							echo "\t<td><a href='resultado.php?search=matches&id=$temp->idCopa'>$temp->ano</a></td>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$temp->idPaisSede'>$paisS</a></td>\n";
							echo "</tr>\n";
							
						}
					}
				?>
			
		</tbody>
	</table>
<a onclick="history.back()" class="btn btn-danger">Voltar</a>