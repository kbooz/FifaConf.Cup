<?php
	
	include_once "database.php";

	class Pais
	{
		private $resp;
		public $idPais;
		public $nomePais;

		function getPais($id)
		{
			$sql = "select nomePais from Pais where idPais = $id";
			$a=banco_select_first($sql);
			if($a)
			{
				$this->nomePais = $a['nomePais'];
				return $this->nomePais;
			}
			else
				return '0';
		}


		function selecionaTodos()
		{
			$sql = "select idPais, nomePais from Pais";

			$this->resp = banco_select($sql);
			if($this->resp)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function proximo()
		{
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPais = $a['idPais'];
				$this->nomePais = $a['nomePais'];
				return true;
			}
			else
			{
				$this->idPais = null;
				$this->nomePais = null;
				return false;
			}		
		}

	}


	
	class Copa
	{
		private $resp;

		public $idCopa;
		public $idPaisSede;
		public $ano;


		function proximo()
		{
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idCopa = $a['idCopa'];
				$this->idPaisSede = $a['idPaisSede'];
				$this->ano = $a['ano'];
				return true;
			}
			else
			{
				$this->idCopa = null;
				$this->idPaisSede = null;
				$this->ano = null;
				return false;
			}		
		}

		function sediou($id)
		{
			$sql = "SELECT COUNT(idCopa) as sediou FROM (Copa) WHERE idPaisSede = $id";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				return $a['sediou'];
			}
			else
			{
				return 0;
			}
		}


		function selecionaTodos()
		{
			$sql = "select idCopa,idPaisSede,ano from Copa";

			$this->resp = banco_select($sql);
			if($this->resp)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function selecionaId($id)
		{
			$sql = "select idPaisSede,ano from Copa where idCopa = $id";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisSede = $a['idPaisSede'];
				$this->ano = $a['ano'];
				return true;
			}
		}
		
	}


	class Jogo
	{
		
		public $idPaisVitoria;
		public $idPaisDerrota;
		public $resultadoVitoria;
		public $resultadoDerrota;
		public $idCopa;
		public $bitFinal;
		



		function proximo()
		{
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idPaisDerrota = $a['idPaisDerrota'];
				$this->resultadoVitoria = $a['resultadoVitoria'];
				$this->resultadoDerrota = $a['resultadoDerrota'];
				$this->bitFinal = $a['bitFinal'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idPaisDerrota = null;
				$this->resultadoVitoria = null;
				$this->resultadoDerrota = null;
				$this->bitFinal = null;
				return false;
			}		
		}


		function selecionaTodos($id)
		{
			$sql = "select idPaisVitoria,idPaisDerrota,resultadoDerrota,resultadoVitoria,bitFinal from Jogos where idCopa = $id";

			$this->resp = banco_select($sql);
			if($this->resp)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function selecionaVencedor($type)
		{
			if($type == "MAX" || $type == "MIN")
				$sql = "SELECT idPaisVitoria, idCopa FROM (Jogos NATURAL JOIN Copa) WHERE bitFinal = 1 AND (ano = (SELECT ".$type."(ano) FROM Copa)";
			
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idCopa = $a['idCopa'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idCopa = null;
				return false;
			}	
		}





		function selecionaMaiorSaldo()
		{
			$sql = "SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota, idCopa FROM (Jogos) HAVING resultadoVitoria + resultadoDerrota = (SELECT MAX(lalala) FROM (SELECT (resultadoVitoria + resultadoDerrota) AS lalala FROM Jogos) AS Y)";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idPaisDerrota = $a['idPaisDerrota'];
				$this->resultadoVitoria = $a['resultadoVitoria'];
				$this->resultadoDerrota = $a['resultadoDerrota'];
				$this->idCopa = $a['idCopa'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idPaisDerrota = null;
				$this->resultadoVitoria = null;
				$this->resultadoDerrota = null;
				$this->bitFinal = null;
				return false;
			}	
		}

		function selecionaFinalMaiorSaldo()
		{
			$sql = "SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota, idCopa  FROM (Jogos) WHERE bitFinal = 1 HAVING resultadoVitoria + resultadoDerrota = ( SELECT MAX(lalala) FROM ( SELECT (resultadoVitoria + resultadoDerrota) AS lalala FROM Jogos WHERE bitFinal = 1) AS Y)";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idPaisDerrota = $a['idPaisDerrota'];
				$this->resultadoVitoria = $a['resultadoVitoria'];
				$this->resultadoDerrota = $a['resultadoDerrota'];
				$this->idCopa = $a['idCopa'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idPaisDerrota = null;
				$this->resultadoVitoria = null;
				$this->resultadoDerrota = null;
				$this->bitFinal = null;
				return false;
			}	
		}
		

		function selecionaCampeao($id)
		{
			$sql = "select idPaisVitoria,idPaisDerrota,resultadoDerrota,resultadoVitoria from Jogos where idCopa = $id and bitFinal = 1";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idPaisDerrota = $a['idPaisDerrota'];
				$this->resultadoVitoria = $a['resultadoVitoria'];
				$this->resultadoDerrota = $a['resultadoDerrota'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idPaisDerrota = null;
				$this->resultadoVitoria = null;
				$this->resultadoDerrota = null;
				$this->bitFinal = null;
				return false;
			}	
		}


		function selecionaSelecao($id)
		{
			$sql = "SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota, bitFinal FROM (Jogos) WHERE idPaisVitoria = $id or idPaisDerrota = $id";
			$this->resp = banco_select($sql);
			if($this->resp)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function participacoes($id)
		{
			$sql = "SELECT COUNT(DISTINCT idCopa) as participacoes FROM (Jogos) WHERE idPaisVitoria = $id or idPaisDerrota = $id";
			$this->resp = banco_select($sql);
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				return $a['participacoes'];
			}
			else
			{
				return 0;
			}
		}
	}


class Temporario
	{
		private $resp;
		public $idPaisVitoria;
		public $idPaisDerrota;
		public $resultadoVitoria;
		public $resultadoDerrota;
		public $bitFinal;
		public $ano;
		public $idPaisSede;
		public $idCopa;


		function selecionaTodos($id1,$id2)
		{
			if($id2!=0)
				$sql ="SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota, Jogos.idCopa, ano, idPaisSede, bitFinal FROM (Jogos INNER JOIN Copa ON Jogos.idCopa = Copa.idCopa) WHERE (idPaisVitoria = $id1 AND idPaisDerrota = $id2) OR (idPaisVitoria = $id2 AND idPaisDerrota = $id1)";
			
			else
				$sql = "SELECT idPaisVitoria, resultadoVitoria, resultadoDerrota, idPaisDerrota, Jogos.idCopa, ano, idPaisSede, bitFinal FROM (Jogos INNER JOIN Copa ON Jogos.idCopa = Copa.idCopa) WHERE (idPaisVitoria = $id1) OR (idPaisDerrota = $id1)";

			$this->resp = banco_select($sql);
			if($this->resp)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function proximo()
		{
			$a = banco_fetch_assoc($this->resp);
			if($a)
			{
				$this->idPaisVitoria = $a['idPaisVitoria'];
				$this->idPaisDerrota = $a['idPaisDerrota'];
				$this->resultadoVitoria = $a['resultadoVitoria'];
				$this->resultadoDerrota = $a['resultadoDerrota'];
				$this->ano = $a['ano'];
				$this->idPaisSede = $a['idPaisSede'];
				$this->bitFinal = $a['bitFinal'];
				$this->idCopa = $a['idCopa'];
				return true;
			}
			else
			{
				$this->idPaisVitoria = null;
				$this->idPaisDerrota = null;
				$this->resultadoVitoria = null;
				$this->resultadoDerrota = null;
				$this->ano = null;
				$this->idPaisSede = null;
				$this->bitFinal = null;
				$this->idCopa = null;
				return false;
			}		
		}

	}


?>