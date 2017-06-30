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
                
                <?php for($n=1;$n <= 2;$n++){?>
                <?php// for($n=0;$n < 5;$n++){?>
                    
                    <!-- 1 -->
                    <div class="max-box">

                        <div class="box">
                            
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
                        <p class="preco-antigo">R$139,90</p>
                        <p class="preco-novo">R$119,90</p>
                        <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

                    </div>

                </div>
                
                <?php } ?>
            
            </div>
            
        </div>
        
    </div>
</section>


