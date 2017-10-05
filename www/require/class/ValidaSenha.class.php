<?php
class ValidaSenha
{
	public function setValidaSenha($pass){
		if(strlen($pass) <1)
			return 'Informe a Senha';
		else 
		if(!preg_match('/^[0-9a-z]{8,12}$/i', $pass))
			return 'Senha Inválida: O campo senha deve ter entre 8 e 12 caracteres sendo apenas letras ou números!';
		else
			return $pass;
	}
}

