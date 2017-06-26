<section class="produtos my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <aside>
            
            <div class="categorizacao">
            
                <h2>Categoria</h2>
                <ul>
                    
                    <li>
                        <a href="#" class="active">Categoria 0</a>
                    </li>
                
                    <?php for($n=1;$n <= 10;$n++){?> 
                    
                        <li>
                            <a href="#">Categoria <?=$n?></a>
                        </li>
                    
                    <?php } ?>
                    
                </ul>
            
            </div>
            
            <div class="categorizacao">
            
                <h2>Marca</h2>
                <ul>
                
                    <?php for($n=1;$n <= 10;$n++){?> 
                    
                        <li>
                            <a href="#">Marca <?=$n?></a>
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
            
                <?php for($n=0;$n < 5;$n++){?> 
                 
                <?php// for($n=0;$n < 5;$n++){?>
                    
                    <!-- 1 -->
                    <div class="max-box">

                        <div class="box">
                            
                            <?=anchor("produtos/produto_descricao",
                            "<div class='img_teste'>
                                    Imagem Produto
                            </div>
                            <p class='detalhes_span'>+ Detalhes</p>")?>
                            <a href="#"><h3 class="nome-produto">Nome do Produto</h3></a>
                            <p class="preco">R$39,90</p>
                            <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

                        </div>

                    </div>
                
                <?php //} ?>
                
                <!-- 2 -->
                <div class="max-box">

                    <div class="box">
                        
                        <p class="novidade">Novidade</p>
                        <a href="#">
                            <div class="img_teste">
                                Imagem Produto
                            </div>
                            <p class="detalhes_span">+ Detalhes</p>
                        </a>    
                        <a href="#"><h3 class="nome-produto">Nome do Produto</h3></a>
                        <p class="preco">R$39,90</p>
                        <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

                    </div>

                </div>
                
                <!-- 3 -->
                <div class="max-box">

                    <div class="box">
                        
                        <p class="promocao">5% OFF</p>
                        <a href="#">
                            <div class="img_teste">
                                Imagem Produto
                            </div>
                            <p class="detalhes_span">+ Detalhes</p>
                        </a>    
                        <a href="#"><h3 class="nome-produto">Nome do Produto</h3></a>
                        <p class="preco-antigo">R$139,90</p>
                        <p class="preco-novo">R$134,90</p>
                        <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

                    </div>

                </div>
                
                <!-- 4 -->
                <div class="max-box">

                    <div class="box">
                        
                        <p class="promocao">13% OFF</p>
                        <a href="#">
                            <div class="img_teste">
                                Imagem Produto
                            </div>
                            <p class="detalhes_span">+ Detalhes</p>
                        </a>    
                        <a href="#"><h3 class="nome-produto">Nome do Produto</h3></a>
                        <p class="preco-antigo">R$159,90</p>
                        <p class="preco-novo">R$139,90</p>
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