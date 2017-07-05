<section class="home my-content">
    <div class="myContainer">
        
        <h1>Página Principal</h1>
        
        <?php //var_dump($lProdutos);?>
        
        <div class="slide-show" id="slider1_container">

            <!-- SLIDES - HOME -->
            <div data-u="slides" class="slide-container">

                <!---------- SLIDE 1 ---------->
                <div class="content"><a href="#">
                    <img src="img/slide_show/1f48222b02dcc__destaque-neutra.jpg">
                </a></div>
                
                <!---------- SLIDE 2 ---------->
                <div class="content"><a href="#">
                    <img src="img/slide_show/1edd433a3266a__22-06-17-Destaque-Skate.jpg">
                </a></div>
                
                <!---------- SLIDE 3 ---------->
                <div class="content"><a href="#">
                    <img src="img/slide_show/2c565492eaaca__CAT-31.jpg">
                </a></div>
                
                <!---------- SLIDE 4 ---------->
                <div class="content"><a href="#">
                    <img src="img/slide_show/1856d337596b__FEM-11.jpg">
                </a></div>
                
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
        
        <div class="destaques">
            
            <h2>Destaques</h2>
            
            <div class="boxes">
                
                <?php foreach($lDestaque as $itemDestaque){?>
                
                 	<?php  $valorParcela = produto_CalcularParcela($itemDestaque["Produto"]["NumeroMaximoParcelas"],$itemDestaque["Produto"]["JurosAPartirDe"],$itemDestaque["Produto"]["PorcentagemJuros"],$itemDestaque["Produto"]["Preco"])?>
                 
                    <div class="master-box">

                        <div class="box">
                            
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemDestaque["Produto"]["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemDestaque["Produto"]["FotoPrincipal"]."")."' alt='".$itemDestaque["Produto"]['Descricao']."' title='".$itemDestaque["Produto"]['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <a href="#"><h3 class="nome-produto"><?=$itemDestaque["Produto"]["Descricao"]?></h3></a>
                            <p class="preco"><?=numeroEmReais($itemDestaque["Produto"]["Preco"])?></p>
                            
                            <?php if($valorParcela != 0){ ?>
                            	<p class="parcela"><?=$itemDestaque["Produto"]["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
							<?php } ?>
							
                        </div>

                    </div>
                
                <?php } ?>
            
            </div>
            
        </div>
        
        <div class="Novidades">
            
            <h2>Novidades</h2>
            
            <div class="boxes">
                
                <?php foreach($lNovidade as $itemNovidade){?>
                
                 	<?php  $valorParcela = produto_CalcularParcela($itemNovidade["NumeroMaximoParcelas"],$itemNovidade["JurosAPartirDe"],$itemNovidade["PorcentagemJuros"],$itemNovidade["Preco"])?>
                 
                    <div class="master-box">

                        <div class="box">
                            
                            <div class="img-content">
                            	<?=anchor("produtos/produto_descricao/".$itemNovidade["Id"]," 
                            	<img src='".base_url("img/Produtos/".$itemNovidade["FotoPrincipal"]."")."' alt='".$itemNovidade['Descricao']."' title='".$itemNovidade['Descricao']."'>
                            	<p class='detalhes_span'>+ Detalhes</p>")?>
                            </div>
                            
                            <a href="#"><h3 class="nome-produto"><?=$itemNovidade["Descricao"]?></h3></a>
                            <p class="preco"><?=numeroEmReais($itemNovidade["Preco"])?></p>
                            
                            <?php if($valorParcela != 0){ ?>
                            	<p class="parcela"><?=$itemNovidade["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
							<?php } ?>
							
                        </div>

                    </div>
                
                <?php } ?>
            
            </div>
            
        </div>
        
    </div>
</section>


