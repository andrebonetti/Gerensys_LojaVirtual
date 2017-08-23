<section class="produtos my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <aside>
        
        	<?php if( count($lBreadCrumb) > 0 ){?>
                    
            	<?=anchor("Produtos/CatalogoCompleto/Pagina/1"
            	,"Limpar Filtros"
            	,array( "class" => "limpra-filtro-atual"))?>
            
            <?php } ?>
            
            <!-- Setores -->
            <div class="categorizacao">
            
                <h2>Setor</h2>
                <ul>
                    
                	<?php foreach($lSetor as $itemSetor){ ?>
						
                        <li>
                        	<?=anchor("Produtos/Setor/{$itemSetor["Descricao"]}/{$itemSetor["Id"]}/Pagina/1"
                        	,$itemSetor["Descricao"]." (".$itemSetor["CountFilhas"].")"
                        	,array( "class" => produto_activeFiltroValor("IdSetor", $itemSetor["Id"])))?>
                        </li>
                    
                    <?php } ?>
                    
                    <?php if( produto_activeFiltro("IdSetor") == "active" ){?>
                    
                    	<li class="limpra-filtro-atual">
                        	<?=anchor("Produtos/Setor/LimpezaFiltro"
                        	,"Limpar Filtro")?>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <!-- Grupos -->
            <?php /*if( isset($lProdutoFiltros["IdSetor"])){*/ ?>
            
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
	                    
	                    	<li class="limpra-filtro-atual">
	                        	<?=anchor("Produtos/Grupo/LimpezaFiltro"
	                        	,"Limpar Filtro")?>
	                        </li>
	                    
	                    <?php } ?>
	                    
	                </ul>
	            
	            </div>
            
			<?php /*}*/ ?>
			
			<!-- SubGrupo -->
            <?php if( isset($lProdutoFiltros["Grupo"]["Id"])){?>
            
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
	                    
	                    	<li class="limpra-filtro-atual">
	                        	<?=anchor("Produtos/SubGrupo/LimpezaFiltro"
	                        	,"Limpar Filtro")?>
	                        </li>
	                    
	                    <?php } ?>
	                    
	                </ul>
	            
	            </div>
	            
            <?php } ?>
			            
            <!-- Marcas -->
            <?php /*if( isset($lProdutoFiltros["SubGrupo"]["Id"])){ */?>
            
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
	                    
	                    	<li class="limpra-filtro-atual">
	                        	<?=anchor("Produtos/Marca/LimpezaFiltro"
	                        	,"Limpar Filtro")?>
	                        </li>
	                    
	                    <?php } ?>
	                    
	                    
	                </ul>
	            
	            </div>

            <?php /* }*/ ?>
                  
        </aside>    
        
        <div class="produtos-content">
            
            <div class="cabecalho">
            
            		<ol class="breadcrumb">
            		
					  	<?php if( count($lBreadCrumb) > 0){?>
					  	
					  		<li class="breadcrumb-item">
					  	
						  		<?=anchor("Produtos/CatalogoCompleto/Pagina/1"
	                    		,"Produtos")?>
                    		
                    		</li>
                    			
					  	<?php } else {?>
					  		
					  		<li class="breadcrumb-item active">
					  			Produtos
					  		</li>
					  		
					  	<?php } ?>
				  		
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
                	
                	<?= form_open("produtos",array("class"=>"form-OrderBy"))?>
                    
	                    <!-- Ordenação -->
		            	<select name="orderBy" class="form-control order-by">
		            		
		            		<?php if($postOrderBy != ""){?>
		            			<option value="postOrderBy"><?=$NomeOrderBy?></option>
		            		<?php } else { ?>
		            			<option>Ordenar por:</option>
		            		<?php } ?>	            		
	                        
	                        <?php if($postOrderBy != "data_mais_novos")		{?><option class="option-for-url" value="data_mais_novos">Mais Novos</option><?php }?>
		            		<?php if($postOrderBy != "data_mais_antigos")	{?><option class="option-for-url" value="data_mais_antigos">Mais Antigos</option><?php }?>
		            		<?php if($postOrderBy != "menor_preco")			{?><option class="option-for-url" value="menor_preco">Menor Preço</option><?php }?>
		            		<?php if($postOrderBy != "maior_preco")			{?><option class="option-for-url" value="maior_preco">Maior Preço</option><?php }?>
	                        
		            	</select>
		            	
		            	<input type="submit" class="no-view btn btn-primary">
	            	
                	<?= form_close() ?>
                	
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
                 
                 	$produto = produto_prepararConteudoMenu($itemProduto);
                     
                    // VIEW BOX
                    $this->view("snipplets/box.php",$content = array("produto" => $produto)); 
                    
                } ?>
                
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

<span class="no-view"><?=base_url()?></span>

<script src="<?= base_url("js/my_script-produtos.js")?>"></script>