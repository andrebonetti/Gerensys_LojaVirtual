<script src="<?=base_url("js/jssor.js")?>"></script>
<script src="<?=base_url("js/jssor.slider.js")?>"></script> 
<script src="<?=base_url("js/my_jassor.js")?>"></script>
<script src="<?=base_url("js/thumbnail-navigator-with-arrows.source.js")?>"></script>

<section class="home my-content">
    <div class="myContainer">
        
        <h1>Página Principal</h1>
        
        <!-- SLIDES -->
        <div class="slide-show" id="slider1_container">

            <!-- SLIDES - HOME -->
            <div data-u="slides" class="slide-container">

                <!---------- SLIDE 1 ---------->
                <div class="content">
                    <a href="#"><img src="<?=base_url("img/slide_show/1f48222b02dcc__destaque-neutra.jpg")?>"></a>
                </div>
                
                <!---------- SLIDE 2 ---------->
                <div class="content">
                    <a href="#"><img src="<?=base_url("img/slide_show/1edd433a3266a__22-06-17-Destaque-Skate.jpg")?>"></a>
                </div>
                
                <!---------- SLIDE 3 ---------->
                <div class="content">
                    <a href="#"><img src="<?=base_url("img/slide_show/2c565492eaaca__CAT-31.jpg")?>"></a>
                </div>
                
                <!---------- SLIDE 4 ---------->
                <div class="content">
                    <a href="#"><img src="<?=base_url("img/slide_show/1856d337596b__FEM-11.jpg")?>"></a>
                </div>
                
            </div>    

            <div data-u="navigator" class="jssorb21" style="position: absolute; bottom: 15px; left: 6px;">
                <div data-u="prototype" style="Width:19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
            </div>

            <!-- Bullet Navigator Skin End -->

            <!-- Arrow Navigator Skin Begin -->
            <!-- Arrow Left -->
            <span data-u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;"></span>
            <!-- Arrow Right -->
            <span data-u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px"></span>
            <!-- Arrow Navigator Skin End -->
            <a style="display: none" href="http://www.jssor.com">image carousel</a>

            <script>
                jssor_slider1_starter('slider1_container');
            </script>

        </div> 
        
        <!-- DESTAQUES -->
        <div class="destaques">
            
            <h2>Destaques</h2>
            
            <div class="boxes">
                
                <?php foreach($lDestaque as $itemDestaque){
                
                 	//Promocao
                 	$HasPromocao = false;
                 	if($itemDestaque["Produto"]["PromocaoPorcentagemDesconto"] > 0){
						
						$itemDestaque["Produto"]["NovoPreco"] 	= produto_promocao_CalcularPromocao($itemDestaque["Produto"]["PromocaoPorcentagemDesconto"],$itemDestaque["Produto"]["Preco"]);
						
					}
                 	if($itemDestaque["Produto"]["PromocaoPrecoFixoDesconto"] > 0){
                 		
                 		$itemDestaque["Produto"]["NovoPreco"] 	= $itemDestaque["Produto"]["PromocaoPrecoFixoDesconto"];
                 		
					}
                	
                	if( isset($itemDestaque["NovoPreco"]) ){
						$preco = $itemDestaque["Produto"]["NovoPreco"];
					}
					else{
						$preco = $itemDestaque["Produto"]["Preco"];
					}
                	
                	//Parcela
                 	$valorParcela 	= produto_CalcularParcela($itemDestaque["Produto"]["NumeroMaximoParcelas"],$itemDestaque["Produto"]["JurosAPartirDe"],$itemDestaque["Produto"]["PorcentagemJuros"],$preco);
                 	
                 	?>
                 	
                    <div class="master-box">

                        <div class="box">
                            
                            <!-- Destaque Promocao -->
                            <?php if($itemDestaque["Produto"]["PromocaoPorcentagemDesconto"] > 0 ){?>
                            	<p class="promocao"><?=$itemDestaque["Produto"]["PromocaoPorcentagemDesconto"]?>% OFF</p>
                           <?php } ?> 
                           <?php if($itemDestaque["Produto"]["PromocaoPrecoFixoDesconto"] > 0 ){?>
                            	<p class="promocao">- <?=numeroEmReais( ($itemDestaque["Produto"]["NovoPreco"] - $itemDestaque["Produto"]["Preco"])*-1) ?></p>
                           <?php } ?> 
                            
                            <!-- Imagem -->
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemDestaque["Produto"]["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemDestaque["Produto"]["FotoPrincipal"]."")."' alt='".$itemDestaque["Produto"]['Descricao']."' title='".$itemDestaque["Produto"]['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <!-- Descricao -->
                            <a href="#"><h3 class="nome-produto"><?=$itemDestaque["Produto"]["Descricao"]?></h3></a>
                            
                            <!-- Preco -->
                            <?php if( ($itemDestaque["Produto"]["PromocaoPorcentagemDesconto"] == null) && ($itemDestaque["Produto"]["PromocaoPrecoFixoDesconto"] == null)) {?>
                            	<p class="preco"><?=numeroEmReais($itemDestaque["Produto"]["Preco"])?></p>
                            <?php } else{?>
                             
                             	<p class="preco-antigo"><?=numeroEmReais($itemDestaque["Produto"]["Preco"])?></p>
                        		<p class="preco-novo"><?=numeroEmReais($itemDestaque["Produto"]["NovoPreco"])?></p>
                             
                            <?php }?>
                            
                            <?php if($valorParcela != 0){ ?>
                            	<p class="parcela"><?=$itemDestaque["Produto"]["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
							<?php } ?>
							
                        </div>

                    </div>
                
                <?php } ?>
            
            </div>
            
        </div>
        
        <!-- NOVIDADES -->
        <div class="Novidades">
            
            <h2>Novidades</h2>
            
            <div class="boxes">
                
                <?php foreach($lNovidade as $itemNovidade){
                	
                	//Promocao
                 	$HasPromocao = false;
                 	if($itemNovidade["PromocaoPorcentagemDesconto"] > 0){
						
						$itemNovidade["NovoPreco"] 	= produto_promocao_CalcularPromocao($itemNovidade["PromocaoPorcentagemDesconto"],$itemNovidade["Preco"]);
						
					}
                 	if($itemNovidade["PromocaoPrecoFixoDesconto"] > 0){
                 		
                 		$itemNovidade["NovoPreco"] 	= $itemNovidade["PromocaoPrecoFixoDesconto"];
                 		
					}
                	
                	if( isset($itemNovidade["NovoPreco"]) ){
						$preco = $itemNovidade["NovoPreco"];
					}
					else{
						$preco = $itemNovidade["Preco"];
					}
                	
                	//Parcela
                 	$valorParcela 	= produto_CalcularParcela($itemNovidade["NumeroMaximoParcelas"],$itemNovidade["JurosAPartirDe"],$itemNovidade["PorcentagemJuros"],$preco);
                 	
                 	?>
                 
                    <div class="master-box">

                        <div class="box">
                            
                            <!-- Destaque Promocao -->
                            <?php if($itemNovidade["PromocaoPorcentagemDesconto"] > 0){?>
                            	<p class="promocao"><?=$itemNovidade["PromocaoPorcentagemDesconto"]?>% OFF</p>
                           <?php } ?> 
                           <?php if($itemNovidade["PromocaoPrecoFixoDesconto"] > 0){?>
                            	<p class="promocao">- <?=numeroEmReais( ($itemNovidade["NovoPreco"] - $itemNovidade["Preco"])*-1) ?></p>
                           <?php } ?> 
                            
                            <!-- Imagem -->
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemNovidade["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemNovidade["FotoPrincipal"]."")."' alt='".$itemNovidade['Descricao']."' title='".$itemNovidade['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <!-- Descrição -->
                            <a href="#"><h3 class="nome-produto"><?=$itemNovidade["Descricao"]?></h3></a>
                            
                            <!-- Preco -->
                            <?php if( ($itemNovidade["PromocaoPorcentagemDesconto"] == null) && ($itemNovidade["PromocaoPrecoFixoDesconto"] == null)) {?>
                            	<p class="preco"><?=numeroEmReais($itemNovidade["Preco"])?></p>
                            <?php } else{?>
                             
                             	<p class="preco-antigo"><?=numeroEmReais($itemNovidade["Preco"])?></p>
                        		<p class="preco-novo"><?=numeroEmReais($itemNovidade["NovoPreco"])?></p>
                             
                            <?php }?>
                            
                            <!-- Parcela -->
                            <?php if($valorParcela != 0){ ?>
                            	<p class="parcela"><?=$itemNovidade["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
							<?php } ?>
							
                        </div>

                    </div>
                
                <?php } ?>
            
            </div>
            
        </div>

    </div>
    
    <!-- GRUPOS -->
    <div class="grupos">
    
        <div class="myContainer">

            <h2>Grupos</h2>
            
            <?php foreach($lGrupo as $itemGrupo){ ?>
        					
                <li>
                    
                	<?=anchor("produtos/index/1/IdGrupo/{$itemGrupo["Id"]}"
                	,"<img src='".base_url("img/Home/".$itemGrupo["Descricao"].".fw.png")."'>")?>
                
                </li>
            
            <?php } ?>
        
        </dib>
        
    </div>
    
</section>


        



