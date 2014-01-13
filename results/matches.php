<?php


$cup = new Copa;
$pais = new Pais;
$cup->selecionaId($id);
$paisNome = $pais->getPais($cup->idPaisSede);

$jogoFinal = new Jogo;
$jogoFinal->selecionaCampeao($id);

$paisCampeao = $pais->getPais($jogoFinal->idPaisVitoria);
$paisVice = $pais->getPais($jogoFinal->idPaisDerrota);

?>
<h1>Copa das Confederações <?php echo $cup->ano;?></h1>
<h2>Pais Sede:<strong> <?php echo "<a href='resultado.php?search=pais&id=$cup->idPaisSede'>$paisNome</a>";?></strong></h2>
<h3>Seleção Campeã:<strong> <?php echo "<a href='resultado.php?search=pais&id=$jogoFinal->idPaisVitoria'>$paisCampeao</a>";?></strong></h3>
<h3>Seleção Vice-Campeã:<strong> <?php echo "<a href='resultado.php?search=pais&id=$jogoFinal->idPaisDerrota'>$paisVice</a>";?></strong></h3>
</br>
<h2>Partidas</h2>
<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<?php
					$jogo = new Jogo;

					if($jogo->selecionaTodos($id))
					{
						while($jogo->proximo())
						{
							$paisA = $pais->getPais($jogo->idPaisVitoria);
							$paisB = $pais->getPais($jogo->idPaisDerrota);
							if($jogo->bitFinal == 1)
								echo "<tr class='success'>\n";
							else
								echo "<tr>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$jogo->idPaisVitoria'>$paisA</a></td>\n";
							echo "\t<td>$jogo->resultadoVitoria</td>\n";
							echo "\t<td>x</td>\n";
							echo "\t<td>$jogo->resultadoDerrota</td>\n";
							echo "\t<td><a href='resultado.php?search=pais&id=$jogo->idPaisDerrota'>$paisB</a></td>\n";
							echo "</tr>\n";
						}
					}
				?>
			</tr>
		</tbody>
	</table>
	<a onclick="history.back()" class="btn btn-danger">Voltar</a>