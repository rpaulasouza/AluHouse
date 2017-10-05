<?php

    $filterIn 	= new ValidaEntradaUsuario;
	$vEmail 	= new ValidaEmail;
	$vSenha 	= new ValidaSenha;

extract($_POST);
	
	$obrigatorio=array($nomerazao, $documento, $cep, $estado, $cidade, $bairro, $rua, $numero, $email, $senha, $rsenha);
	
	$nomeArray= explode(' ',$nomerazao);
	
	for($i=0;$i<count($obrigatorio);$i++)
	{
		if($obrigatorio[$i]=='')
			$msg='Todos os campos marcados com * são de preenchimento obrigatório!';
	}
	
	if(isset($msg)){
		print $msg;
	}else
	if(isset($nomeArray[1])=='')
		print 'Qual seu sobrenome?';
	else
	if($vEmail->setValidaEmail($email)<>$email)
		print $vEmail->setValidaEmail($email);
	else
	if($vSenha->setValidaSenha($senha)<>$senha)
		print $vSenha->setValidaSenha($senha);
	else	
	if($rsenha<>$senha)
		print 'Senhas não conferem!';
	else
	if($crud->select('email', 'tbclientes', ' WHERE email=?', array($email))->rowCount()>0)
		print 'E-mail já está em uso!';
	


?>