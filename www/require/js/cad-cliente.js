$('cad').click(function(){
$.post('require/jp/jpcad-cliente.php',
	{
		nomerazao:$('#nomerazao').val(),
		email:$('#email').val(),
		senha:$('#senha').val(),
		rsenha:$('#rsenha').val()
				
	},function(res){
		
		
		var msg=$('.msg-cad'),
			formAll=$('main #cadastrar *');
			
			if(res)
			{
				msg.slideDown().html(res).css({background:'#ff3131'});
			}else{
				msg.slideDown().html('Cadastro realizado com sucesso.').css({background:'#069'});
				
				setTimeout(function(){window.open('index.html#pagetwo')}, 2000);
			}
	});	
});

function cadastrar(){
	
	
	//alert("estou na função cadastrar");
	
	$.post('require/jp/jpcad-cliente.php',
	{
		nomerazao:$('#nomerazao').val(),
		email:$('#email').val(),
		senha:$('#senha').val(),
		rsenha:$('#rsenha').val()
				
	},function(res){
		
		
		var msg=$('.msg-cad'),
			formAll=$('main #cadastrar *');
			
			if(res)
			{
				msg.slideDown().html(res).css({background:'#ff3131'});
			}else{
				msg.slideDown().html('Cadastro realizado com sucesso.').css({background:'#069'});
				
				setTimeout(function(){window.location="index.html#pagetwo"}, 2000);
			}
	});
}
