<?php

	class UrlAmigavel
	{
		private $param, $r_URL, $pos, $pos0, $pos1, $urlRi, $idp, $nomep;
		
		public function setUrlAmigavel($param, $ri)
		{
			$this->param=$param;	
			
			if($this->param)
			{
				//Tratar $ri
				if(isset($ri)){
					$this->urlRi=explode('=',$ri);
					//echo $this->urlRi[0]."<br/>";
					//echo $this->urlRi[1]."<br/>";
					
					$this->idp = explode("&",$this->urlRi[1]);
					//echo $this->idp[0]."<br/>";
					
					//echo $this->urlRi[1]."<br/>";
					$this->nomep = $this->urlRi[2];
					//echo $this->urlRi[2]."<br/>";
				}
				//Tratar $ri
				
				
				//echo $this->param;
				 //$this->r_URL=substr($this->param, 6);
				 $this->r_URL=explode('/',substr($this->param, 6));
				 
				 $this->pos0=isset($this->r_URL[0])?$this->r_URL[0]:NULL;
				 if(isset($this->r_URL[0])){
				 	echo $this->r_URL[0]."<br/>";
				 }
				 $this->pos1=isset($this->r_URL[1])?$this->r_URL[1]:NULL;
				 
				 $this->pos=!substr_count($this->param, '/admin/')?$this->pos0:$this->pos1;
				 
				 	 
				 if(substr($this->param, -1,1)=='/')
				 {
				 	return "404.php";
				 }else
				 if(file_exists($this->pos.'.php'))
				 {
				 	if(!empty($this->idp) && !empty($this->nomep)){
				 		echo $this->pos.'.php'.'/'.$this->nomep.'/'.$this->idp[0];
				 		//return $this->pos.'/'.$this->nomep.'/'.$this->idp[0].'.php';
				 		return $this->pos.'.php';
						
					} else {
						echo $this->pos.'.php';
						return $this->pos.'.php';
					}
				 	
				 	
				 }
				 else
				 {
				 	return "404.php";	
				 }		 
			 
			}else{
				return "home.php";
			}
			
		}
	}