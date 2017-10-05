<?php

	$nomeprod = trim($_POST['nomeprod']);
	$imagem = $_POST['imagem'];
	$preco = trim($_POST['preco']);
	$descprod = trim($_POST['descprod']);
	$largura = ltrim($_POST['largura']);
	$comprimento = trim($_POST['comprimento']);
	$altura = trim($_POST['altura']);
	$peso = trim($_POST['peso']);
	
	if(empty($peso)){
		$peso = "2";
	}
	if(empty($altura)==''){
		$altura = "8";
	}
	if(empty($comprimento)){
		$comprimento = "20";
	}
	if(empty($largura)){
		$largura = "20";
	}
	
	//print $largura;
	
	if(empty($preco))
		print "Qual Preço?";
	else
	if(empty($imagem))
		print "Qual imagem?";
	else
	if(empty($nomeprod))
		print "Qual nome do produto?";
	//else
		//print "Produto correto!";
		
	
	
	$dimensoes = getimagesize($imagem);
	print $dimensoes[0];
	
	/**
	* 
	* nomeprod:$('#nomeprod').val(),
		imagem:$('#imagem').val(),
		preco:$('#preco').val(),
		descprod:$('#descprod').val(),
		largura:$('#largura').val(),
		comprimento:$('#comprimento'),
		altura:$('#altura').val(),
		peso:$('#peso').val()
	* 
	*/
	
	//print $imagem;