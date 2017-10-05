function fctNovidades()
{
	$.post('require/jp/novidades.php',
	{
		email:$('#email_news').val()
		
		
	},function(res)
	{		
		//alert(res);	
		if(res)
			$('.mensagem').html(res).css({color:'#069'});
		else
			//#f00
			//location.href="admin/index.php";
			$('.mensagem').html('E-mail incorreto!!').css({color:'#f00'});
	});	
}