<?php

	$selecao = new Pais;
	$selecao->getPais($id);
	$campeao = array();
	$qtdJogos = 0;
	$maiorGol = 0;
	$copa = new Copa;
	$arrayCopas = array();

	$jogo = new Jogo;
	$copa = new Copa;
	

	if($jogo->selecionaSelecao($id))
	{
		while($jogo->proximo())
		{
			$qtdJogos++;

			if($jogo->bitFinal ==1)
			{
				if($jogo->idPaisVitoria == $id)
				{
					array_push($campeao, $jogo->idCopa);
				}
			}

			if($id == $jogo->idPaisVitoria)
				$maiorGol = ($maiorGol< $jogo->resultadoVitoria)? $jogo->resultadoVitoria : $maiorGol;
			if($id == $jogo->idPaisDerrota)
				$maiorGol = ($maiorGol< $jogo->resultadoDerrota)? $jogo->resultadoDerrota : $maiorGol;

		}
	}
	$sediou = $copa->sediou($id);

?>

<h1><?php echo "$selecao->nomePais";?></h1>
<h4><?php echo count($campeao);?> Vezes Campeão</h4>
<h4><?php echo $qtdJogos;?> Partidas</h4>
<h4><?php echo $jogo->participacoes($id);?> Participações</h4>
<h4>Sediou <?php echo ($sediou>1||$sediou==0)?"$sediou Copas":"$sediou Copa";?> </h4>
<h4>Maior Quantidade de Gols: <?php echo $maiorGol;?></h4>

<a onclick="history.back()" class="btn btn-danger">Voltar</a>