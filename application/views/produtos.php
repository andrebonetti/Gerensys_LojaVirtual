<section class="produtos my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <aside>
        
        	<?php /* if( produto_HasSession() == "active" ){*/?>
                    
                	<?=anchor("Produtos/CatalogoCompleto/Pagina/1"
                	,"Limpar Filtros"
                	,array( "class" => "limpra-filtro-atual"))?>
            
            <?php /*} */?>
            
            <div class="categorizacao">
            
                <h2>Setor</h2>
                <ul>
                    
                	<?php foreach($lSetor as $itemSetor){ ?>
						
						<?php /* {$itemSetor["Descricao"]}/{$itemSetor["Id"]}/Pagina/1" */ ?>
						
                        <li>
                        	<?=anchor("Produtos/Setor/{$itemSetor["Descricao"]}/{$itemSetor["Id"]}/Pagina/1"
                        	,$itemSetor["Descricao"]." (".$itemSetor["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdSetor", $itemSetor["Id"])))?>
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdSetor") == "active" ){?>
                    
                    	<li>
                        	<?=anchor("Produtos/Setor/LimpezaFiltro"
                        	,"Limpar Filtro"
                        	,array( "class" => "limpra-filtro-atual"))?>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Cores</h2>
               	<ul>
                    
                	<?php foreach($lCor as $itemCor){ ?>
						
                        <li>
                            
                        	<?=anchor("produtos/index/1/IdCor/{$itemCor["Id"]}"
                        	,$itemCor["Descricao"]." (".$itemCor["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdCor", $itemCor["Id"])))?>
                        
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdCor") == "active" ){?>
                    
                    	<li>
                        	<?=anchor("Produtos/Cor/LimpezaFiltro"
                        	,"Limpar Filtro"
                        	,array( "class" => "limpra-filtro-atual"))?>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Grupos</h2>
               	<ul>
                    
                	<?php foreach($lGrupo as $itemGrupo){ ?>
						
                        <li>
                            
                        	<?=anchor("produtos/index/1/IdGrupo/{$itemGrupo["Id"]}"
                        	,$itemGrupo["Descricao"]." (".$itemGrupo["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdGrupo", $itemGrupo["Id"])))?>
                        
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdGrupo") == "active" ){?>
                    
                    	<li>
                        	<?=anchor("Produtos/Grupo/LimpezaFiltro"
                        	,"Limpar Filtro"
                        	,array( "class" => "limpra-filtro-atual"))?>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Marcas</h2>
               	<ul>
                    
                	<?php foreach($lMarca as $itemMarca){ ?>
						
                        <li>
                            
                        	<?=anchor("produtos/index/1/IdMarca/{$itemMarca["Id"]}"
                        	,$itemMarca["Descricao"]." (".$itemMarca["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdMarca", $itemMarca["Id"])))?>
                        
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdMarca") == "active" ){?>
                    
                    	<li>
                        	<?=anchor("Produtos/Marca/LimpezaFiltro"
                        	,"Limpar Filtro"
                        	,array( "class" => "limpra-filtro-atual"))?>
                        </li>
                    
                    <?php } ?>
                    
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>SubGrupo</h2>
               	<ul>
                    
                	<?php foreach($lSubGrupo as $itemSubGrupo){ ?>
						
                        <li>
                            
                        	<?=anchor("produtos/index/1/IdSubGrupo/{$itemSubGrupo["Id"]}"
                        	,$itemSubGrupo["Descricao"]." (".$itemSubGrupo["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdSubGrupo", $itemSubGrupo["Id"])))?>
                        
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdSubGrupo") == "active" ){?>
                    
                    	<li>
                        	<?=anchor("Produtos/SubGrupo/LimpezaFiltro"
                        	,"Limpar Filtro"
                        	,array( "class" => "limpra-filtro-atual"))?>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
        </aside>    
        
        <div class="produtos-content">
            
            <div class="cabecalho">
            
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
						  	
						  		<li class="breadcrumb-item active">
		                        	<?=$itemBreadCrumb["Descricao"]?>
						  		</li>
						  	
						  	<?php } else {?>
						  	
						  		
							  	<li class="breadcrumb-item">
							  		<?=anchor("{$itemBreadCrumb["Link"]}"
		                        	,"{$itemBreadCrumb["Descricao"]}")?>
							  	</li>
						  	
						  	<?php } ?>
					  	
					  <?php $n++;}
					  
					  ?>
					  
					</ol>
					            	    	
                    <!-- Total Imoveis -->
	            	<p class="total">Total de <?=$numeroProdutos?> produtos.</p>
                
                    <!-- Ordenação -->
	            	<select class="form-control order-by">
	            		
	            		<option>Ordenar por:</option>
	            			            		
                        <option class="option-for-url " name="order" value="codigo">Código</option>
	            		<option class="option-for-url " name="order" value="menor_preco">Menor Preço</option>
	            		<option class="option-for-url " name="order" value="maior_preco">Maior Preço</option>
                        
	            	</select>
                
                    <!-- Paginação -->
                    
                    <?php if ($numeroPaginas > 1){?>
                    
	                    <ul class="pagination">
	                    
	                    	<!-- Primeira Pagina -->
	                        <?php if($pPaginaAtual >= 4){?> 
	                            <li><?= anchor("produtos/index/1","1......")?></li> 
	                        <?php } ?> 

	                        <!-- anterior IF-PAG - 2 -->
	                        <?php if(($pPaginaAtual != 1)&&(($pPaginaAtual-2) >= 1)) { $pagina = $pPaginaAtual-2?>
	                            <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
	                        <?php } ?> 

	                        <!-- anterior IF-PAG - 1 -->
	                        <?php if($pPaginaAtual != 1){$pagina = $pPaginaAtual-1?>
	                            <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
	                        <?php } ?> 

	                        <!-- atual -->
	                        <li class="active"><?= anchor("produtos/index/$pPaginaAtual",$pPaginaAtual)?></li>   

	                        <!-- proximo IF-SET + 1-->
	                        <?php for($n=1;$n<7;$n++){
	                        	
	                            	if(($pPaginaAtual+$n) <= $numeroPaginas){?>
			                            <?php $pagina = $pPaginaAtual+$n?>
			                                <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
			                            <?php }} ?>

	                        <!-- Ultimo -->
	                        <?php if($pPaginaAtual < $numeroPaginas){ 
	                            $pagina = $numeroPaginas;
	                            if($pagina > '3'){?>
	                                <li><?= anchor("produtos/index/$pagina","......$pagina")?> </li> 
	                       	<?php }} ?>         
	                                  	
	                    </ul>
                    
                    <?php } ?>
                
            </div>
            
            <div class="boxes">
            
                <?php foreach($lProduto as $itemProduto){ 
                 
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
                           <?php if($itemProduto["Id"] >= ($numeroProdutos-5)){?>
                           		<p class="novidade">Novidade</p>
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
            
            <!-- Paginação -->
            <?php if ($numeroPaginas > 1){?>
                    
                <ul class="pagination">
                
                	<!-- Primeira Pagina -->
                    <?php if($pPaginaAtual >= 4){?> 
                        <li><?= anchor("produtos/index/1","1......")?></li> 
                    <?php } ?> 

                    <!-- anterior IF-PAG - 2 -->
                    <?php if(($pPaginaAtual != 1)&&(($pPaginaAtual-2) >= 1)) { $pagina = $pPaginaAtual-2?>
                        <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
                    <?php } ?> 

                    <!-- anterior IF-PAG - 1 -->
                    <?php if($pPaginaAtual != 1){ $pagina = $pPaginaAtual-1?>
                        <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
                    <?php } ?> 

                    <!-- atual -->
                    <li class="active"><?= anchor("produtos/index/$pPaginaAtual",$pPaginaAtual)?></li>   

                    <!-- proximo IF-SET + 1-->
                    <?php for($n=1;$n<7;$n++){
                    	
                        	if(($pPaginaAtual+$n) <= $numeroPaginas){?>
	                            <?php $pagina = $pPaginaAtual+$n?>
	                                <li><?= anchor("produtos/index/$pagina",$pagina)?></li>  
	                            <?php }} ?>

                    <!-- Ultimo -->
                    <?php if($pPaginaAtual < $numeroPaginas){ 
                        $pagina = $numeroPaginas;
                        if($pagina > '3'){?>
                            <li><?= anchor("produtos/index/$pagina","......$pagina")?> </li> 
                   	<?php }} ?>         
                              	
                </ul>
            
            <?php } ?>
            
        </div>
        
    </div>
</section>