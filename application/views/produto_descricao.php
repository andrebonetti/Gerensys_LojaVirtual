<script src="<?=base_url("js/jssor.js")?>"></script>
<script src="<?=base_url("js/jssor.slider.js")?>"></script> 
<script src="<?=base_url("js/my_jassor.js")?>"></script>
<script src="<?=base_url("js/thumbnail-navigator-with-arrows.source.js")?>"></script>

<section class="produto-descricao my-content">
    <div class="myContainer">
    
        <div class="container1">
        
        	<ol class="breadcrumb">
			  <li class="breadcrumb-item">
			  
		  		<?=anchor("Produtos/CatalogoCompleto/Pagina/1"
            	,"Produtos")?>

			  </li>
			  
			  <?php 
				    $totalBread = count($lBreadCrumb);
				    $n = 1;
				    foreach($lBreadCrumb as $itemBreadCrumb){?>
			  	
				  	<!-- Active -->
				  	<?php if($n == $totalBread){?>
				  	
				  		<li class="breadcrumb-item">
				  			<?=anchor("produtos",$itemBreadCrumb["Descricao"])?>
				  		</li>
					  	
					<?php } else {?>
					  	
					  	<li class="breadcrumb-item">
					  		<?=anchor("{$itemBreadCrumb["Link"]}"
                        	,"{$itemBreadCrumb["Descricao"]}")?>
					  	</li>
				  	
				  	<?php } ?>
				  	
			  <?php $n++;}
			  
			  ?>
			  
			  <li class="breadcrumb-item active">
		  		<?=$produto["Descricao"]?>
		  	  </li>
			  	
			</ol>

            <div class="info-compra">
            
                <h1><?=$produto["Descricao"]?></h1>
                
                <!-- VALOR -->
                <div class="valor">
                
                	<?php  $valorParcela = produto_CalcularParcela($produto["NumeroMaximoParcelas"],$produto["JurosAPartirDe"],$produto["PorcentagemJuros"],$produto["Preco"])?>
                 
                    <h2>Preço:</h2><p class="preco"><?=numeroEmReais($produto["Preco"])?></p>

					<?php if($valorParcela != 0){ ?>
                        <div class="opcao-parcela">
                    	    <p>
                               <!--<span class="no-negrito">ou</span>-->
                                <?=$produto["NumeroMaximoParcelas"]?> 
                               <span class="no-negrito">de</span> 
                                <?=numeroEmReais($valorParcela)?>
                            </p>
                            <a href="" data-toggle="modal" data-target="#mdlParcelas">Ver Parcelas</a>
					    </div>
                    <?php } ?>
                    
                </div>
                
                <!-- CARTOES -->
                <div class="cartoes">



                </div>

                <!-- FAVORITOS - CLASSIFICACAO -->
                <div class="favoritos-classificacao">
                    
                    <div class="favorito">
                        
                        <h3>Tornar Favorito</h3>
                        
                        <?php if( (isset($produto["IdFavorito"])) && ($produto["IdFavorito"] != null) ) { ?>
                            <?=anchor("cliente/favoritos_excluir/{$produto["IdFavorito"]}/{$produto["Id"]}","<img src='".base_url("img/icone_favoritos_vermelho.png")."'>",array("class"=>"favoritos_add"))?>
                        <?php } else { ?>               
                            <?=anchor("cliente/favoritos_incluir/{$produto["Id"]}","<img src='".base_url("img/icone_favoritos.png")."'>",array("class"=>"favoritos_add"))?>                 
                        <?php } ?>
                        
                    </div>    
                    
                    <div class="classificacao">
                    
                        <h3>Classificação</h3>
                        
                    </div>
                
                </div>

                <!-- CALCULA-FRETE -->
                <div class="calculo-frete">

                    <h2>Calculo de Frete</h2>
                    <input type="text" class="form-control" id="cep" placeholder="CEP">
                    <button class="calcular-frete" >Calcular Frete</button>

                </div>
                
                <!-- VARIANTES -->
                <?php if( count($produto["lVariantes"]) > 0 ){ ?>
                
                    <span class="has-variante no-view">1</span>
                
                    <div class="variantes">
                
                        <h2>Variantes</h2>
                    
                        <?php if( count($produto["lVariantes"]["lTamanho"] > 0 )) { ?>
                        
                            <span class="has-variante-tamanho no-view">1</span>
                        
                            <h3>Tamanhos</h3>
                        
                            <div class="listaVariantes listaTamanhos">
                                
                                <?php foreach($produto["lVariantes"]["lTamanho"] as $itemTamanho){ ?>
                                
                                    <div class="variante variante-Tamanho">
                                        
                                        <?php 
                                            $info = produtoEstoque_DefinirCSSVariante($itemTamanho["Qtde_Estoque"]["EstoqueTotal"]); 
                                            $dataToggle = "";
                                            $msg = "";
                                            $ativo = "variante-option variante-naoAtiva";
                                            if($info["css"] == "alerta"){
                                                $dataToggle = "tooltip";
                                                $msg = "Restam apenas {$itemTamanho["Qtde_Estoque"]["EstoqueTotal"]} produtos no estoque";
                                            }
                                            if($info["css"] == "esgotado"){
                                                $dataToggle = "tooltip";
                                                $msg = "Produto Esgotado";
                                                $ativo = "";
                                            }                                                                                                                                                       
                                        ?>
                                        
                                        <span class="QtdeAlerta no-view"><?=$info["qtdeAlerta"]?></span>
                                        <span class="msgPadrao no-view"><?=$msg?></span>
                                        <span class="togglePadrao no-view"><?=$dataToggle?></span>
                                        
                                        <p class="<?=$info["css"]?> <?=$ativo?> " data-name="tamanho" data-value="<?=$itemTamanho["IdTamanho"]?>" data-content="<?=$itemTamanho["DescricaoTamanho"]?>" data-toggle="<?=$dataToggle?>" data-html="true" title="<?=$msg?>" ><?=$itemTamanho["DescricaoTamanho"]?></p>
                                        
                                        <?php foreach($itemTamanho["Qtde_Estoque"]["lDetalhada"] as $itemDetalhada) { ?>
                                        
                                            <span class="<?=$itemDetalhada["Chave"]?> no-view"><?=$itemDetalhada["Conteudo"]?></span>
                                        
                                        <?php } ?>
                                        
                                    </div>
                                
                                <?php } ?>
                                
                            </div>
                        
                        <?php } else { ?>
                        
                            <span class="has-variante-tamanho no-view">0</span>
                        
                        <?php } ?>
                        
                        <?php if( count($produto["lVariantes"]["lCor"] > 0 )) { ?>
                        
                            <span class="has-variante-cor no-view">1</span>
                        
                            <h3>Cores</h3>
                        
                            <div class="listaVariantes listaCores">
                                
                                <?php foreach($produto["lVariantes"]["lCor"] as $itemCor){ ?>
                                
                                    <div class="variante variante-Cor">
                                        
                                        <?php 
                                            $info = produtoEstoque_DefinirCSSVariante($itemCor["Qtde_Estoque"]["EstoqueTotal"]); 
                                            $dataToggle = "";
                                            $msg = "";
                                            $ativo = "variante-option variante-naoAtiva";
                                            if($info["css"] == "alerta"){
                                                $msg = " - Restam apenas {$itemCor["Qtde_Estoque"]["EstoqueTotal"]} produtos no estoque";
                                            }
                                            if($info["css"] == "esgotado"){
                                                $msg = " - Produto Esgotado";
                                                $ativo = "";
                                            }                                                                                                                                                       
                                        ?>
                                        
                                        <span class="QtdeAlerta no-view"><?=$info["qtdeAlerta"]?></span>
                                        <span class="msgPadrao no-view"><?=$itemCor["DescricaoCor"].$msg?></span>
                                        <span class="nomeCor no-view"><?=$itemCor["DescricaoCor"]?></span>
                                      
                                        <p style="background-color: <?=$itemCor["CorCSS"]?>" class="<?=$info["css"]?> <?=$ativo?>" data-name="cor" data-value="<?=$itemCor["IdCor"]?>" data-content="<?=$itemCor["DescricaoCor"]?>" data-toggle="tooltip" data-html="true" title="<?=$itemCor["DescricaoCor"].$msg?>"></p>
                                        
                                        <?php foreach($itemCor["Qtde_Estoque"]["lDetalhada"] as $itemDetalhada) { ?>
                                        
                                            <span class="<?=$itemDetalhada["Chave"]?> no-view"><?=$itemDetalhada["Conteudo"]?></span>
                                        
                                        <?php } ?>
                                        
                                    </div>
                                
                                <?php } ?>
                                
                            </div>
                        
                        <?php } else { ?>
                        
                            <span class="has-variante-cor no-view">0</span>
                        
                        <?php } ?>
                        
                    </div>
                    
                <?php } else { ?>
                
                    <span class="has-variante no-view">0</span>    
                
                <?php } ?>
                
                <!-- COMPRAR -->
                <div class="compra">

                    <h2>Comprar</h2>
                    
                    <?= form_open("carrinho/incluir_post")?>
                    
                        <input type="hidden" name="idproduto" value="<?=$produto["Id"]?>"/>
                        <input type="hidden" name="precoproduto" value="<?=$produto["Preco"]?>"/>
                    
                        <table class="table table-stripped">
                        
                            <thead>
                            
                                <tr>
                                    <th class="qtde">Quantidade</th>
                                    
                                    <?php if (count($produto["lVariantes"]) > 0){ ?>
                                    
                                        <th class="tamanho">Tamanho</th>
                                        <th class="cor">Cor</th>
                                    
                                    <?php } ?>
                                </tr>
                                
                            </thead>
                            
                            <tbody>
                                
                                <tr>
                                	<td class="qtde"><input type="text" class="form-control quantidade" name="quantidade" id="qtde" value="1"></td>
                                    
                                    <?php if (count($produto["lVariantes"]) > 0){ ?>
                                    
                                    <td class="tamanho tamanho-td">---</td>
                                    <td class="cor cor-td">---</td>
                                    
                                    <?php } ?>
                                    
                                </tr>
                                
                            </tbody>
                            
                        </table>
                    
                        <input type="hidden" class="tamanho-input" name="IdTamanho" value="">
                        <input type="hidden" class="cor-input" name="IdCor" value="">

                        <div class="finalizacao-venda">
                            
                            <p class="alert alert-warning alerta-variantes no-view">Selecione todas as variantes do produto para finalizar a compra.</p>
                            
                            <input type="submit" class="btn btn-success adicionar-carrinho" value="Adicionar ao Carrinho">
                            <button class="compra-rapida btn btn-danger">Compra Rapida</button>
                            
                        </div>
                    
                    <?= form_close() ?>  

                </div>

            </div>

            <div class="img-content" id="slider1_container" style="height: 480px;">

                <!-- Loading Screen -->
                <div u="loading" class="loading">
                    <div class="loading1"></div>
                    <div class="loading2"></div>
                </div>

                <!-- Slides Container -->
                <div u="slides" class="uSlides">
                    
                	<?php foreach($produto["Fotos"] as $itemFoto){ ?>
                
	                    <div>
	                        <img u="image" src="<?=base_url("img/Produtos/".$itemFoto["NomeArquivo"]."")?>"/>
	                        <img u="thumb" src="<?=base_url("img/Produtos/".$itemFoto["NomeArquivo"]."")?>"/>
	                    </div>
					
					<?php } ?>
					
                </div>

                <!-- THUMB NAVIGATOR -->
                <div u="thumbnavigator" class="jssort07">
                    <div class="upSlides"></div>

                    <div u="slides" class="Tslides">
                        <div u="prototype" class="p" id="pSlides" style="POSITION: absolute; WIDTH: 99px; HEIGHT: 66px; TOP: 0; LEFT: 0;">
                            <thumbnailtemplate class="i" style="position:absolute;"></thumbnailtemplate>
                            <div class="o">
                            </div>
                        </div>
                    </div>

                    <!-- Arrow Left -->
                    <span u="arrowleft" class="jssora11l" style=""></span>
                    <!-- Arrow Right -->
                    <span u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px"></span>

                </div>

            </div>

        </div>

        <div class="descricao-produto">
        
            <div class="info-principal">
                
                <h2>Descrição</h2>
            
                <p><?= auto_typography($produto["Detalhes"]) ?></p>
                
            </div>
            
            <div class="info-adicionais">
            
                <h2>Informações Adicionais</h2>
            
                <p><?= auto_typography($produto["Informacoes_Adicionais"]) ?></p>
                
            </div>
        
        </div>
        
        <?php if(count($lProdutoRelacionado) > 0){?>
            
            <div class="produtos-relacionados">
            
            <h2>Produtos Relacionados</h2>
            
            <div class="boxes">
            
                <?php foreach($lProdutoRelacionado as $itemProduto){ 
                 
                 	//Promocao
                 	$HasPromocao = false;
                 	if($itemProduto["PromocaoPorcentagemDesconto"] > 0){
						
						$itemProduto["NovoPreco"] 	= produto_promocao_CalcularPromocao($itemProduto["PromocaoPorcentagemDesconto"],$itemProduto["Preco"]);
						
					}
                 	if($itemProduto["PromocaoPrecoFixoDesconto"] > 0){
                 		
                 		$itemProduto["NovoPreco"] 	= $itemProduto["PromocaoPrecoFixoDesconto"];
                 		
					}
                	
                	if( isset($itemProduto["NovoPreco"]) ){
						$preco = $itemProduto["NovoPreco"];
					}
					else{
						$preco = $itemProduto["Preco"];
					}
                	
                	//Parcela
                 	$valorParcela 	= produto_CalcularParcela($itemProduto["NumeroMaximoParcelas"],$itemProduto["JurosAPartirDe"],$itemProduto["PorcentagemJuros"],$preco);
                 	
                 	?>
                 
                    <div class="master-box">

                        <div class="box">
                            
                            <!-- Destaque Promocao -->
                            <?php if($itemProduto["PromocaoPorcentagemDesconto"] > 0){?>
                            	<p class="promocao"><?=$itemProduto["PromocaoPorcentagemDesconto"]?>% OFF</p>
                           <?php } ?> 
                           <?php if($itemProduto["PromocaoPrecoFixoDesconto"] > 0){?>
                            	<p class="promocao">- <?=numeroEmReais( ($itemProduto["NovoPreco"] - $itemProduto["Preco"])*-1) ?></p>
                           <?php } ?> 
                           
                            <!-- Imagem -->
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemProduto["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemProduto["FotoPrincipal"]."")."' alt='".$itemProduto['Descricao']."' title='".$itemProduto['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <!-- Descrição -->
                            <a href="#"><h3 class="nome-produto"><?=$itemProduto["Descricao"]?></h3></a>
                            
                            <!-- Preco -->
                            <?php if( ($itemProduto["PromocaoPorcentagemDesconto"] == null) && ($itemProduto["PromocaoPrecoFixoDesconto"] == null)) {?>
                            	<p class="preco"><?=numeroEmReais($itemProduto["Preco"])?></p>
                            <?php } else{?>
                             
                             	<p class="preco-antigo"><?=numeroEmReais($itemProduto["Preco"])?></p>
                        		<p class="preco-novo"><?=numeroEmReais($itemProduto["NovoPreco"])?></p>
                             
                            <?php }?>
                            
                            <!-- Parcela -->
                            <?php if($valorParcela != 0){ ?>
                            	<p class="parcela"><?=$itemProduto["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
							<?php } ?>
							
                        </div>

                    </div>
                
                <?php } ?>
                
            </div>
            
        </div>
        <?php } ?>
        
    </div>
    
    <div class="modal fade" id="mdlParcelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contato</h4>
                </div>
                
                <div class="modal-body">
                  
                    <?php  $lOpcoesParcelas = produto_ListarOpcoesParcelas($produto["NumeroMaximoParcelas"],$produto["JurosAPartirDe"],$produto["PorcentagemJuros"],$produto["Preco"])?>
                 
                    <table class="table table-stripped">
                    
                        <thead>
                        
                            <tr>
                            
                                <th>Parcela</th>
                                <th>Valor</th>
                                <th>Juros</th>
                                <th>Valor Total</th>
                                
                            </tr>
                            
                        </thead>
                    
                        <tbody>
                        
                            <?php foreach ($lOpcoesParcelas as $itemParcela) { ?>
                            
                                <tr>
                                
                                    <td><?=$itemParcela["Parcela"]?></td>
                                    <td><?=$itemParcela["Valor"]?></td>
                                    <td><?=$itemParcela["Juros"]?></td>
                                    <td><?=$itemParcela["ValorTotal"]?></td>
                                    
                                </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
          </div>
    </div>
    
</section>

<script src="<?=base_url("js/my_script-produtoDescricao.js")?>"></script>