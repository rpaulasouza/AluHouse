function cadastrarProduto(){
	
	//alert("estou no cad produto");
	var imagem = $('#imagem').files;
	alert(imagem);
	for (var i = 0, f; f = imagem[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate.toLocaleDateString(), '</li>');
                  
                  alert(escape(f.name));
                  
    }	
	
	/*$.post('../require/js/admin/jp/jpcadproduto.php',
	{
		
		nomeprod:$('#nomeprod').val(),
		imagem:$('#imagem').target.files,
		preco:$('#preco').val(),
		descprod:$('#descprod').val(),
		largura:$('#largura').val(),
		comprimento:$('#comprimento').val(),
		altura:$('#altura').val(),
		peso:$('#peso').val()
	
	},function(res){
			
		var msg=$('.msgprod');
			
			if(res)
			{
				//alert(res);
				
				msg.slideDown().html(res).css({background:'#ff3131'});
			}
		
	});*/
}