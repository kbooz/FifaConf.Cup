<?php
	$page = "index";
	include_once 'header.php';

	$jogo = new Jogo;
	$pais = new Pais;
	$copa = new Copa;
?>

<div class="container">
	<div class="row">
		<div class="page-header">
		  <h1>Copa das Confederações <small>Alguns dados e curiosidades do torneio da FIFA</small></h1>
		</div>

		</br>

		<blockquote>
			<?php
				$jogo -> selecionaMaiorSaldo();
				$copa -> selecionaId($jogo->idCopa);
			echo "<p> $jogo->resultadoVitoria x $jogo->resultadoDerrota </p>";
			?>
			<small>Foi o jogo que mais rendeu gols, na partida entre <?php echo "<a href='resultado.php?search=pais&id=$jogo->idPaisVitoria'>". $pais->getPais($jogo->idPaisVitoria) ."</a>";?> e <?php echo "<a href='resultado.php?search=pais&id=$jogo->idPaisDerrota'>". $pais->getPais($jogo->idPaisDerrota)."</a>";?>, na copa de <?php echo "<a href='resultado.php?search=matches&id=$jogo->idCopa'>". $copa->ano."</a>";?>.</small>
		</blockquote>


		<blockquote class="pull-right">
			<?php
				$jogo -> selecionaFinalMaiorSaldo();
				$copa -> selecionaId($jogo->idCopa);
			echo "<p> $jogo->resultadoVitoria x $jogo->resultadoDerrota </p>";
			?>
			<small>Foi a final que mais rendeu gols, na partida entre <?php echo "<a href='resultado.php?search=pais&id=$jogo->idPaisVitoria'>". $pais->getPais($jogo->idPaisVitoria) ."</a>";?> e <?php echo "<a href='resultado.php?search=pais&id=$jogo->idPaisDerrota'>". $pais->getPais($jogo->idPaisDerrota)."</a>";?>, na copa de <?php echo "<a href='resultado.php?search=matches&id=$jogo->idCopa'>". $copa->ano."</a>";?>.</small>
		</blockquote>

		<?php
			/*
			$jogoV = new Jogo;
			$copaV = new Copa;
			$jogo -> selecionaVencedor("MIN");
			$jogoV -> selecionaVencedor("MAX");
			$copa -> selecionaId($jogo->idCopa);
			$copaV -> selecionaId($jogoV->idCopa);
			*/
		?>
		<!--
		<p class="lead">
			<?php echo "<a href='resultado.php?search=pais&id=$jogo->idPaisVitoria'>". $pais->getPais($jogo->idPaisVitoria) ."</a>";?>
		</p>
		-->


	</div>
</div>

<?php
	include_once 'footer.php';
	?>