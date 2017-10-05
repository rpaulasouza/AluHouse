
function recuperar(){
	
	//alert("estou na função cadastrar");
	
	$.post('require/jp/jprecuperar.php',
	{
		email:$('#email').val(),
		senha:$('#senha').val(),
		rsenha:$('#rsenha').val()
				
	},function(res){
		
		
		var msg=$('.msg-cad'),
			formAll=$('main form *');
			
			if(res)
			{
				msg.slideDown().html(res).css({background:'#ff3131'});
			}else{
				msg.slideDown().html('Senha Modificada com sucesso.').css({background:'#069'});
				
				setTimeout(function(){location.href='#pagetwo';}, 4000);
			}
	});
}
