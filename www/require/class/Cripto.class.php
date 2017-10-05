<?php

class Cripto 
{
	public function setCripto($param)
	{
		$_cripto=hash('sha512',$param);	// 128 caracteres	
		return $_cripto;
	}
}
/*
$cpt = new Cripto;
var_dump($cpt->setCripto('12345678'));
*/