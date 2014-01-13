<?php
	$page = "pesquisa";
	include_once 'header.php';
?>
</br>
<div class="tabbable">
	 <ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">PvP</a></li>
	 </ul>

	<div class="tab-content">

			<div class="tab-pane active" id="tab1">

				</br>

				<form method="get" action="resultado.php">
					<div align="center" width="200px">
						<select name="id1">
								<?php

								$pais = new Pais;
								if($pais->selecionaTodos())
								{
									while($pais->proximo())
									{
										echo "<option value=$pais->idPais>$pais->nomePais</option>\n";
									}
								}

								?>
						</select>
						<strong> Versus </strong>
						<select name="id2">
							<option value="0">Todos os Paises</option>
							<?php

							$pais = new Pais;
							if($pais->selecionaTodos())
							{
								while($pais->proximo())
								{
									echo "<option value=$pais->idPais >$pais->nomePais</option>\n";
								}
							}

							?>
						</select>
						</br></br>
						<input value="Envia!" class="btn btn-default" type="submit"></input>
						<input name="search" value="pvp" type="hidden"></input>
				</div>
				</form>

			</div>
	 </div>
</div>




<?php
	include_once 'footer.php';
	?>