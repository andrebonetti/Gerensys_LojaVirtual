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
                    
                    $produto = produto_prepararConteudoMenu($itemDestaque["Produto"]);
                    ?>
                 	
                    <div class="master-box">

                        <div class="box">
                            
                            <?php if($produto["CssEstoque"]["css"] == "esgotado" ){?>
                            	<p class="produto-esgotado">Produto Esgotado</p>
                           <?php } ?> 
                           <?php if($produto["CssEstoque"]["css"] == "alerta" ){?>
                            	<p class="alerta-estoque"><?=$produto["EstoqueTotal"]?> No Estoque</p>
                           <?php } ?>
                           
                           <?php if($produto["CssEstoque"]["css"] == "" ){ ?>
                           
                               <!-- Novidade Promocao -->
                                <?php if($produto["PromocaoPorcentagemDesconto"] > 0 ){?>
                                	<p class="promocao"><?=$produto["PromocaoPorcentagemDesconto"]?>% OFF</p>
                               <?php } ?> 
                               <?php if($produto["PromocaoPrecoFixoDesconto"] > 0 ){?>
                                	<p class="promocao">- <?=numeroEmReais( ($produto["NovoPreco"] - $produto["Preco"])*-1) ?></p>
                               <?php } ?> 
                           
                           <?php } ?>
                            
                            <!-- Imagem -->
                            <div class="img-content">
                                
                            	<?=anchor("produtos/produto_descricao/".$produto["Id"]
                                ,"<img src='".$produto["imagem1"]."' alt='".$produto['Descricao']."' title='".$produto['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>",array("class" => $produto["classImg1"]))?>
                                
                                <?php if(isset($produto["imagem2"])){ ?>
                                
                                    <?=anchor("produtos/produto_descricao/".$produto["Id"]
                                    ,"<img src='".$produto["imagem2"]."' alt='".$produto['Descricao']."' title='".$produto['Descricao']."'>
                                    <p class='detalhes_span'>+ Detalhes</p>"
                                    ,array("class" => "Foto2"))?>
                                
                                <?php } ?>
                                
                            </div>
                            
                            <!-- Descricao -->
                            <a href="#"><h3 class="nome-produto"><?=$produto["Descricao"]?></h3></a>
                            
                            <!-- Preco -->
                            <?php if( ($produto["PromocaoPorcentagemDesconto"] == null) && ($produto["PromocaoPrecoFixoDesconto"] == null)) {?>
                            	<p class="preco"><?=numeroEmReais($produto["Preco"])?></p>
                            <?php } else{?>
                             
                             	<p class="preco-antigo"><?=numeroEmReais($produto["Preco"])?></p>
                        		<p class="preco-novo"><?=numeroEmReais($produto["NovoPreco"])?></p>
                             
                            <?php }?>
                            
                            <?php if($produto["valorParcela"] != 0){ ?>
                            	<p class="parcela"><?=$produto["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($produto["valorParcela"])?></p>
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
                	
                	$produto = produto_prepararConteudoMenu($itemNovidade);
                    ?>
                 	
                    <div class="master-box">

                        <div class="box <?=$produto["CssEstoque"]["css"]?>">
                            
                            <?php if($produto["CssEstoque"]["css"] == "esgotado" ){?>
                            	<p class="produto-esgotado">Produto Esgotado</p>
                           <?php } ?> 
                           <?php if($produto["CssEstoque"]["css"] == "alerta" ){?>
                            	<p class="alerta-estoque"><?=$produto["EstoqueTotal"]?> No Estoque</p>
                           <?php } ?>
                           
                           <?php if($produto["CssEstoque"]["css"] == "" ){ ?>
                           
                               <!-- Novidade Promocao -->
                                <?php if($produto["PromocaoPorcentagemDesconto"] > 0 ){?>
                                	<p class="promocao"><?=$produto["PromocaoPorcentagemDesconto"]?>% OFF</p>
                               <?php } ?> 
                               <?php if($produto["PromocaoPrecoFixoDesconto"] > 0 ){?>
                                	<p class="promocao">- <?=numeroEmReais( ($produto["NovoPreco"] - $produto["Preco"])*-1) ?></p>
                               <?php } ?> 
                           
                           <?php } ?>
                            
                            <!-- Imagem -->
                            <div class="img-content">
                                
                            	<?=anchor("produtos/produto_descricao/".$produto["Id"]
                                ,"<img src='".$produto["imagem1"]."' alt='".$produto['Descricao']."' title='".$produto['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>",array("class" => $produto["classImg1"]))?>
                                
                                <?php if(isset($produto["imagem2"])){ ?>
                                
                                    <?=anchor("produtos/produto_descricao/".$produto["Id"]
                                    ,"<img src='".$produto["imagem2"]."' alt='".$produto['Descricao']."' title='".$produto['Descricao']."'>
                                    <p class='detalhes_span'>+ Detalhes</p>"
                                    ,array("class" => "Foto2"))?>
                                
                                <?php } ?>
                                
                            </div>
                            
                            <!-- Descricao -->
                            <a href="#"><h3 class="nome-produto"><?=$produto["Descricao"]?></h3></a>
                            
                            <!-- Preco -->
                            <?php if( ($produto["PromocaoPorcentagemDesconto"] == null) && ($produto["PromocaoPrecoFixoDesconto"] == null)) {?>
                            	<p class="preco"><?=numeroEmReais($produto["Preco"])?></p>
                            <?php } else{?>
                             
                             	<p class="preco-antigo"><?=numeroEmReais($produto["Preco"])?></p>
                        		<p class="preco-novo"><?=numeroEmReais($produto["NovoPreco"])?></p>
                             
                            <?php }?>
                            
                            <?php if($produto["valorParcela"] != 0){ ?>
                            	<p class="parcela"><?=$produto["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($produto["valorParcela"])?></p>
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