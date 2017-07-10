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

                <div class="valor">
                
                	<?php  $valorParcela = produto_CalcularParcela($produto["NumeroMaximoParcelas"],$produto["JurosAPartirDe"],$produto["PorcentagemJuros"],$produto["Preco"])?>
                 
                    <h2>Preço: <?=$produto["Preco"]?></h2>

                    <p class="valor-total">R$ 39,90</p>
					
					<?php if($valorParcela != 0){ ?>
                    	<p class="parcela"><span class="no-negrito">ou</span> <?=$produto["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
					<?php } ?>
                    
                </div>

                <div class="cartoes">



                </div>

                <div class="calculo-frete">

                    <h2>Calculo de Frete</h2>
                    <input type="text" class="form-control" id="cep" placeholder="CEP">
                    <button class="calcular-frete" >Calcular Frete</button>

                </div>

                <div class="compra">

                    <h2>Comprar</h2>

                    <label>Quantidade</label>
                    <input type="text" class="form-control" id="qtde" value="1">

                    <div class="opcoes">
                        <button class="compra-rapida">Compra Rápida</button>
                        <button class="adicionar-carrinho">Adicionar ao Carrinho</button>
                    </div>

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
        
        <div class="produtos-relacionados">
            
            <h2>Produtos Relacionados</h2>
            
            <div class="boxes">
            
                <?php for($n=0;$n < 2;$n++){?> 
                 
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
                
                <!-- 5 -->
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
            
        </div>
        
    </div>
</section>