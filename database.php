<?php
	function banco_conecta()
	{
		$host = "localhost";
		$user = "root";
		$pass = "";
		$banco = "confederacoes";
		$c = mysql_connect($host,$user,$pass);
		if(!$c)
		{
			echo mysql_error();
			return false;
		}
		if(!mysql_select_db($banco))
		{
			echo mysql_error();
			return false;
		}
		return true;	
	}


	function banco_select_first($sql)
	{
		if(!banco_conecta())
		{
			return false;
		}
		$resp = mysql_query($sql); 
		if(!$resp)
		{
			echo mysql_error();
			return false;
		}
		$a = mysql_fetch_assoc($resp);
		mysql_free_result($resp);
		return $a;
	}

	function banco_select($sql)
	{
		if(!banco_conecta())
		{
			return false;
		}
		$resp = mysql_query($sql); 
		if(!$resp)
		{
			echo mysql_error();
			return false;
		}
		return $resp;
	}

	function banco_fetch_assoc($resp)
	{
		$a = mysql_fetch_assoc($resp);
		if(!$a)
		{
			mysql_free_result($resp);
			return null;
		}
		return $a;
	}
?>