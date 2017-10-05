<?php
	class Login
	{
		private $valEmail, $valSenha, $cpt, $crud, $email, $senha, $log, $dds;
		public function setLogin($email,$senha)
		{
			$this->valEmail=new ValidaEmail;
			$this->valSenha=new ValidaSenha;
			$this->cpt=new Cripto;
			$this->crud=new CRUD;
			
			$this->email=$this->valEmail->setValidaEmail($email);
			$this->senha=$this->valSenha->setValidaSenha($senha);
			
			$this->log=$this->senha==$senha?
			$this->crud->select('id, nomerazao, nivel','tbclientes',' WHERE email=?  && senha=?', 
								array($this->email,$this->cpt->SetCripto($this->senha))):
			FALSE;
			
			
			if($this->email<>$email)
			{
				return $this->email;
			}else
			if($this->senha<>$senha)
			{
				return $this->senha;
			}else {
				if($this->log && $this->log->rowCount()>0)
				{
					foreach($this->log as $this->dds)
					{
						//return $this->dds[2];
						//$_SESSION['logado'] = $this->dds;
						// Salva os dados encontrados na sessão
							session_start();
						  $_SESSION['UsuarioID'] = $this->dds[0];
						  $_SESSION['UsuarioNome'] = $this->dds[1];
						  $_SESSION['UsuarioNivel'] = $this->dds[2];
						
						//header('location:../../admin/');
					}
				}else
				{
					return "Acesso Negado!";
				}	
			}
		
		}
	}