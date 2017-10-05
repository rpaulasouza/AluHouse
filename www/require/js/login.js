function fctLogin()
{
	$.post('require/jp/jpLogin.php',
	{
		email:$('#email').val(),
		senha:$('#senha').val()
		
	},function(res)
	{		
		//alert(res);	
		if(res)
			$('main form span').html(res).css({color:'#f00'});
		else
			
			location.href="home";
			//$('main form span').html('Logado com sucesso!!').css({color:'#069'});
	});	
}