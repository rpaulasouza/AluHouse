<?php
class ValidaEntradaUsuario
{
	public function vEntradaUsuario($entrada)
	{	
		$retorna = htmlentities(strip_tags($entrada), ENT_QUOTES);
		return $retorna;		
		//return htmlentities(strip_tags($entrada), ENT_QUOTES);		
	}
}