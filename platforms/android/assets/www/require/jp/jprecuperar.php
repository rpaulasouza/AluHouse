<?php
require_once"../class/CRUD.class.php";
$filterIn 	= new ValidaEntradaUsuario;
$vSenha 	= new ValidaSenha;
$cripto		= new Cripto;
$crud 		= new CRUD;
extract($_POST);

if($vSenha->setValidaSenha($senha)<>$senha)
		print $vSenha->setValidaSenha($senha);
	else	
	if($rsenha<>$senha)
		print 'Senhas não conferem!';
		else
		$crud->update(' tbclientes', ' senha = ? WHERE email = ?', array($cripto->setCripto($senha) , $email));
		
		
		//$cripto->setCripto($senha)



