<link type="text/css" rel="stylesheet" href="require/css/home.css" />

<!-- Inicio Novo Carro. -->
	  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  </style>
	  <div id=tudo>
	  <div class="container" >
	 
	  <link rel="stylesheet" href='css/hoverbox.css' type="text/css" media="screen, projection" />
	  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="require/img/projeto/b1.jpg" alt="Sapatilhas" width="430" height="345">
      </div>

      <div class="item">
        <img src="require/img/projeto/b3.jpg" alt="Saltos" width="430" height="345">
      </div>
    
      <div class="item">
        <img src="require/img/projeto/b2.jpg" alt="Saltos" width="430" height="345">
      </div>

      <div class="item">
        <img src="require/img/projeto/b4.jpg" alt="Sapatilhas" width="430" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	  <!-- Fim Novo Carro. -->
	 
	</div>
					





<div id="baixo">
	
	<div class="heading_title_div">
						<h2 class="heading_title">
							<p>Lançamentos & Novidades</p>
						</h2>
					</div>
	<div>
	<?php 
		require_once"require/class/CRUD.class.php";
	 $crud 		= new CRUD;
      $prod =$crud->select('idproduto, nomeproduto, preco, descricao, foto', 'produtos', ' ORDER BY idproduto DESC LIMIT 16', array(''));
      $loopH = 3;
      $i = 0;
      foreach ($prod as $row)
		{
			
	?>
		<div>
			<!--<figure><a href="produto?id=<?=$row[0]?>"><img src="require<?=PRODUTO?><?=$row[4]?>" /></a></figure>-->			
			<figure><a href="produto?id=<?=$row[0]?>"><img src="require/img/produtos/assets/img/<?=$row[4]?>?>" /></a></figure>			
			<figcaption>
				<ul>
					<li></li>
					<li><a href="produto?id=<?=$row[0]?>"><?=$row[1]?></a></li>
					<li></li>
					<li>por: <span><?= number_format(floatval($row[2]), 2, ",", ".")?></span></li>					
					<li><a href="produto?add=<?=$row[0]?>" title="Adicionar ao carrinho"><img src="require/img/projeto/comprar.jpg" width="100" height="30"/></a></li>						
					<li>
					<style>
						.estrelas<?php echo $row[0];?> input[type=radio] {
						  display: none;
						}
						.estrelas<?php echo $row[0]; ?> label i.fa:before {
						  content:'\f005';
						  color: #FC0;
						}
						.estrelas<?php echo $row[0]; ?> input[type=radio]:checked ~ label i.fa:before {
						  color: #CCC;
						}
						
					</style>
						<div class="estrelas<?=$row[0]?>">
						  <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
						  <label for="cm_star-1"><i class="fa"></i></label>
						  <input type="radio" id="cm_star-1" name="fb" value="1"/>
						  <label for="cm_star-2"><i class="fa"></i></label>
						  <input type="radio" id="cm_star-2" name="fb" value="2"/>
						  <label for="cm_star-3"><i class="fa"></i></label>
						  <input type="radio" id="cm_star-3" name="fb" value="3"/>
						  <label for="cm_star-4"><i class="fa"></i></label>
						  <input type="radio" id="cm_star-4" name="fb" value="4"/>
						  <label for="cm_star-5"><i class="fa"></i></label>
						  <input type="radio" id="cm_star-5" name="fb" value="5"/>
						</div>	
						
					</li>					
				</ul>
			</figcaption>
		</div>
		<?php } ?>
	</div>
</div>
</div>