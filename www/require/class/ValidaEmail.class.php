<?php

	class ValidaEmail
	{
		public function setValidaEmail($email)
		{
			$ext = array('.com','.br','.net','.gov','.org','.tv');
						
			if(empty($email))
				return 'Informe o e-mail.';
			else
			if(!preg_match('/^[0-9a-z\_\.\-]+\@[0-9a-z\_\.\-]*[0-9a-z\_\-]+\.[a-z]{2,4}$/i', $email))	
				return 'E-mail inválido.';
			else
			if(!in_array(strrchr($email,'.'),$ext))
				return 'E-mail inválido!';
			else	
			return $email;
		}
	}
