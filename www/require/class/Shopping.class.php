<?php

class Shopping 
{
	private $cr, $Total, $qtdProdutos;
	
	function carrinho(){
		$this->cr = new CRUD;
		$this->Total = 0;
		$this->qtdProdutos = 0;
		$subTotal = 0;
		//session_destroy();
		if($_SESSION){
			//echo "sucesso";
			// Separar nome de quantidade
			//print_r($_SESSION);
			foreach($_SESSION as $nome => $quantidade){
				if($quantidade > 0){
				if(substr($nome,0,9) == 'produtos_'){
					$id = substr($nome,9,(strlen($nome)-9));
					
					$tamanho = $_SESSION['tam_'.$id];

					//echo $id;
					// Montar Carrinho
					$PD = $this->cr->select('idproduto, nomeproduto, preco, tamanhos', ' produtos', ' WHERE idproduto=?', array($id));
					//number_format($subTotal, 2, ",", ".")
					foreach ($PD as $row)
					{
						$subTotal = $quantidade * $row[2]; // quantidade x valor unitário
						//echo 'Nome: '.$row[1].' '.$quantidade.' x R$ '.number_format(floatval($row[2]), 2, ",", ".").' = R$ '.number_format($subTotal, 2, ",", ".").'<br/>';
			
						echo '<tr>
								<td width="300" height="44" bgcolor="#fff">'.$row[1].'</td>
								<td width="50" height="44" bgcolor="#fff">'.$tamanho.'</td>
								';
							
								
						echo	'<td width="74" height="44" align="center" valign="middle" bgcolor="#fff">'.$quantidade.' x </td>
								<td width="114" height="44" align="center" valign="middle" bgcolor="#fff">'.number_format(floatval($row[2]), 2, ",", ".").'</td>
								<td width="64" height="44" align="center" valign="middle" bgcolor="#fff">
									<a href="processa/add='.$id.'" title="Adicionar mais 1 ao carrinho"><img src="require/img/projeto/addcar1.jpg" width="30" height="30"/></a>
								</td>
								<td width="64" height="44" align="center" valign="middle" bgcolor="#fff">
									<a href="processa/menos='.$id.'" title="Retirar 1 do carrinho"><img src="require/img/projeto/tirarcar1.png"width="30" height="30"/></a>
								</td>
								<td width="64" height="44" align="center" valign="middle" bgcolor="#fff">
									<a href="processa/del='.$id.'" title="Excluir produto do carrinho"><img src="require/img/projeto/ex.png"width="30" height="30"/></a>
								</td>	
								<td width="100" height="44" align="center" valign="middle" bgcolor="#fff"> R$ '.number_format($subTotal, 2, ",", ".").'</td>
							</tr>';
					}
					
					
					$this->Total += $subTotal;
					$this->qtdProdutos += $quantidade;
					$_SESSION['qtd_produtos'] = $this->qtdProdutos;
					$_SESSION['qtd_Total'] = $this->Total;
								
				}
				
				
				//$this->qtdProdutos += $quantidade;
				}
				
			}
			
		}			
	
			if($this->Total == 0){
				echo "<b>Não há Produtos no Carrinho</b>";
			} else {
				echo '<tr>
						<td colspan="5"></td>
						
						<td colspan="2" align="center" valign="middle" bgcolor="#fff"><b>Total :</b></td>
						<td height="44" align="center" valign="middle" bgcolor="#fff">R$ '.number_format($this->Total, 2, ',', '.').'</td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td bgcolor="#fff"><b>Forma de Entrega</b></td>
						<form action="processapedido" method="post" id="form">
						<td colspan="2" bgcolor="#fff"><select name="formacorreio" id="formacorreio"><option value="1">PAC</option><option value="2">SEDEX</option></select></td>
						
						<td height="44" style="text-align: center;" bgcolor="#fff">
							<button type="submit"  >
								<img src="require/img/projeto/pgpagseguro.png"width="80" height="30"/>
							</button>
							
						</td>
						</form>
					</tr>
					<tr>
						<td colspan="7">
							<form method="post" action="carrinho">
								<label>Insira seu Cep: <input type="text" name="cepdestino" /></label>
								<label><input type="hidden" name="peso" value="2000"/></label>
								<input type="submit" name="BTEnvia" value="Calcular Frete">
							</form>';
					
					// calcular frete
					function calcular_frete($cep_origem,
    $cep_destino,
    $peso,
    $valor,
    $tipo_do_frete,
    $altura = 6,
    $largura = 20,
    $comprimento = 20){
 
 $parametros = array();
	
	// Código e senha da empresa, se você tiver contrato com os correios, se não tiver deixe vazio.
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	
	// CEP de origem e destino. Esse parametro precisa ser numérico, sem "-" (hífen) espaços ou algo diferente de um número.
	$parametros['sCepOrigem'] = '04841150';
	$parametros['sCepDestino'] = $cep_destino;
	
	// O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso da embalagem.
	$parametros['nVlPeso'] = $peso;
	
	// O formato tem apenas duas opções: 1 para caixa / pacote e 2 para rolo/prisma.
	$parametros['nCdFormato'] = '1';
	
	// O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números
	$parametros['nVlComprimento'] = $comprimento;
	$parametros['nVlAltura'] = $altura;
	$parametros['nVlLargura'] = $largura;
	$parametros['nVlDiametro'] = '0';
	
	// Aqui você informa se quer que a encomenda deva ser entregue somente para uma determinada pessoa após confirmação por RG. Use "s" e "n".
	$parametros['sCdMaoPropria'] = 'n';
	
	// O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela. Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).
	$parametros['nVlValorDeclarado'] = $valor;
	
	// Se você quer ser avisado sobre a entrega da encomenda. Para não avisar use "n", para avisar use "s".
	$parametros['sCdAvisoRecebimento'] = 'n';
	
	// Formato no qual a consulta será retornada, podendo ser: Popup – mostra uma janela pop-up | URL – envia os dados via post para a URL informada | XML – Retorna a resposta em XML
	$parametros['StrRetorno'] = 'xml';
	
	// Código do Serviço, pode ser apenas um ou mais. Para mais de um apenas separe por virgula.
	$parametros['nCdServico'] = '40010,41106';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			if($linhas->Codigo == 41106){
				echo "PAC".' - ';
			}
			if($linhas->Codigo == 40010){
				echo "SEDEX".' - ';
			}
			echo ' R$ '.$linhas->Valor .' - ';
			echo ' Prazo de Entrega: '.$linhas->PrazoEntrega.' Dias </br>';
		}else {
			echo $linhas->MsgErro;
		}
		echo '<hr>';
	}
 
}

if (isset($_POST['BTEnvia'])) {
	
	//Variaveis de POST, Alterar somente se necessário 
	//====================================================
	$cepDestino = $_POST['cepdestino'];
	$peso = $_POST['peso'];
	$val = (calcular_frete('04841150', $cepDestino,
    2,
    35,
    '41106'));
	}
					// calcular frete
					
					echo	'</td>
						<td height="44" style="text-align: center;" bgcolor="#fff"><a href="home" title="Voltar pra Loja"><b>Voltar pra Loja</b></a></td>
					</tr>'
					;
					
					
					
			}
		
		
	}
	
}