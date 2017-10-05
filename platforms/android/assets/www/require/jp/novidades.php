<?php
require_once"../class/CRUD.class.php";
$lgn=new ValidaEmail;
$crud=new CRUD;

if($lgn->setValidaEmail($_POST['email']) == $_POST['email']){

$crud->insert(' novidades',' email=?',array($lgn->setValidaEmail($_POST['email'])));
print 'Cadastrado para receber novidades com sucesso!';	
}

//print $lgn->setValidaEmail($_POST['email']);
