<?php
	
abstract class ConDB
	{
		private $cnx;
		
		private function setConn()
		{  
			return
			is_null($this->cnx)?
				$this->cnx=new PDO('mysql:host=localhost;dbname=u242903443_ellas', 'u242903443_roger','novasenhabanco', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")):
				$this->cnx;		
		
		//return	new PDO('mysql:host=mysql.hostinger.com.br;dbname=u242903443_ellas', 'u242903443_roger','novasenhabanco');
		}
		public function getConn()
		{
			return $this->setConn();
		}
	}
//$crud=new CRUD;
//$crud->insert('user','user=?, email=?, cidade=?', array('Nometeste','roger@gmail.com','Cidade de Deus'));

//$sel=$crud->select('*', 'user', '', array());
//foreach($sel as $reg)
//{
//	var_dump($reg);
//}

//$upd=$crud->update('user', 'user=?, email=?, cidade=? WHERE idUser = ?',
//					array('Adriana suja', 'dri@gmail.com', 'cidade', 3)
//					);

//$crud->delete('user', ' WHERE idUser=?', array(4));
/*
$vle=new ValidaEmail;
var_dump($vle->setValidaEmail('silvio@hotmail.com.xxx'));

$vls=new ValidaSenha;
var_dump($vls->setValidaSenha('12345474'));
*/
/*
$lgn=new Login;
$lgn->setLogin('dri@gmail.com', '12345678');
*/
