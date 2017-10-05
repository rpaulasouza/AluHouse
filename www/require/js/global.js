function vCampos(el, er){
	var e=$(el).val().replace(er,'');
	$(el).val(e);
}

function num(el){
	vCampos(el,/[^0-9]/g);
}

function maskTel(el){
	vCampos(el,/[^0-9\-]/g);
	// 8888-8888
	var e=$(el).val();
	
	if(event.keyCode!=8)
	{
		if(e.length==4)
			$(el).val(e+'-');
	}
}

function maskCel(el){
	vCampos(el,/[^0-9\-]/g);
	// 8888-8888
	var e=$(el).val();
	
	if(event.keyCode!=8)
	{
		if(e.length==1)
			$(el).val(e+'-');
		if(e.length==6)
			$(el).val(e+'-');
	}
}
function maskData(el){
	vCampos(el,/[^0-9\/]/g);
	//10/12/1980
	var e=$(el).val();
	
	if(event.keyCode!=8){
		if(e.length==2)
			$(el).val(e+'/');
		if(e.length==5)
			$(el).val(e+'/');		
	}
}

function maskCpf(el){
	// 000.000.000-00
	vCampos(el,/[^0-9\.\-]/g);
	
	var e=$(el).val();
	
	if(event.keyCode!=8){
		if(e.length==3)
			$(el).val(e+'.');
		if(e.length==7)
			$(el).val(e+'.');
		if(e.length==11)
			$(el).val(e+'-');
	}
}

function maskCnpj(el){
	// 00.000.000/0000-00
	vCampos(el,/[^0-9\.\-\/]/g);
	
	var e=$(el).val();
	
	if(event.keyCode!=8){
		if(e.length==2)
			$(el).val(e+'.');
		if(e.length==6)
			$(el).val(e+'.');
		if(e.length==10)
			$(el).val(e+'/');
		if(e.length==15)
			$(el).val(e+'-');
	}
}

function maskCep(el){
	vCampos(el,/[^0-9]/g);
	// 8888888
	var e=$(el).val();
}
