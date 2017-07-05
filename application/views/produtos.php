<section class="produtos my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <aside>
            
            <div class="categorizacao">
            
                <h2>Setor</h2>
                <ul>
                    
                	<?php foreach($lSetor as $itemSetor){ ?>
						
                        <li>
                            <a href="#"><?=$itemSetor["Descricao"]?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Cores</h2>
               	<ul>
                    
                	<?php foreach($lCor as $itemCor){ ?>
						
                        <li>
                            <a href="#"><?=$itemCor["Descricao"]?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Grupos</h2>
               	<ul>
                    
                	<?php foreach($lGrupo as $itemGrupo){ ?>
						
                        <li>
                            <a href="#"><?=$itemGrupo["Descricao"]?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Marcas</h2>
               	<ul>
                    
                	<?php foreach($lMarca as $itemMarca){ ?>
						
                        <li>
                            <a href="#"><?=$itemMarca["Descricao"]?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>SubGrupo</h2>
               	<ul>
                    
                	<?php foreach($lSubGrupo as $itemSubGrupo){ ?>
						
                        <li>
                            <a href="#"><?=$itemSubGrupo["Descricao"]?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
        </aside>    
        
        <div class="produtos-content">
            
            <div class="cabecalho">
            	    	
                    <!-- Total Imoveis -->
	            	<p class="total">Total de 332 produtos.</p>
                
                    <!-- Ordenação -->
	            	<select class="form-control order-by">
	            		
	            		<option>Ordenar por:</option>
	            			            		
                        <option class="option-for-url " name="order" value="codigo">Código</option>
	            		<option class="option-for-url " name="order" value="menor_preco">Menor Preço</option>
	            		<option class="option-for-url " name="order" value="maior_preco">Maior Preço</option>
                        
	            	</select>
                
                    <!-- Paginação -->
                    <ul class="pagination">
                        
                        <li class="active"><a href="http://localhost/Jobara/index.php/imoveis/0/0/pagina/1">1</a></li>   
                        <li><a href="#">2</a></li>  
                        <li><a href="#">3</a></li>  
                        <li><a href="#">4</a></li>  
                        <li><a href="#">5</a></li>  
                        <li><a href="#">6</a></li>  
                        <li><a href="#">7</a></li>  
                        <li><a href="#">......21</a></li>   
                                                                        	
                    </ul>
                
            </div>
            
            <div class="boxes">
            
                <?php foreach($lProduto as $itemProduto){?> 
                 
                    <div class="master-box">

                        <div class="box">
                            
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemProduto["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemProduto["Fotos"][0]["NomeArquivo"]."")."' alt='".$itemProduto['Descricao']."' title='".$itemProduto['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <a href="#"><h3 class="nome-produto">Nome do Produto</h3></a>
                            <p class="preco">R$39,90</p>
                            <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

                        </div>

                    </div>
                
                <?php } ?>
                
            </div>
            
            <!-- Paginação -->
            <ul class="pagination final">

                <li class="active"><a href="http://localhost/Jobara/index.php/imoveis/0/0/pagina/1">1</a></li>   
                <li><a href="#">2</a></li>  
                <li><a href="#">3</a></li>  
                <li><a href="#">4</a></li>  
                <li><a href="#">5</a></li>  
                <li><a href="#">6</a></li>  
                <li><a href="#">7</a></li>  
                <li><a href="#">......21</a></li>   

            </ul>
            
        </div>
        
    </div>
</section>