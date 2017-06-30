<section class="produto-descricao my-content">
    <div class="myContainer">
              
        <div class="container1">
            
            <div class="info-compra">

                <h1>Nome do Produto</h1>

                <div class="valor">

                    <h2>Preço: </h2>

                    <p class="valor-total">R$ 39,90</p>

                    <p class="parcela">9x <span class="no-negrito">de</span> R$5,12</p>

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
                    <input type="text" class="form-control" id="qtde">

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
                    <div>
                        <img u="image" src="<?=base_url("img/slide_show/1f48222b02dcc__destaque-neutra.jpg")?>"/>
                        <img u="thumb" src="<?=base_url("img/slide_show/1f48222b02dcc__destaque-neutra.jpg")?>"/>
                    </div>
                    <div>
                        <img u="image" src="<?=base_url("img/slide_show/1edd433a3266a__22-06-17-Destaque-Skate.jpg")?>"/>
                        <img u="thumb" src="<?=base_url("img/slide_show/1edd433a3266a__22-06-17-Destaque-Skate.jpg")?>"/>
                    </div>
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
            
                <p>Quem tem um aficcionado por dinossauros em casa vai adorar essa novidade! O Quebra-Cabeça 3D Tiranossauro-Rex da Bate Bumbo é uma ótima opção de presente para meninas e meninos apaixonados por essas incríveis criaturas.</p>

                <p>Depois de montado, a criança pode criar aventuras fantásticas com o seu novo mascote e também usá-lo na decoração do seu quarto. Ele brilha no escuro!</p>

                <p>Estimula a percepção visual, a coordenação motora, a concentração, o raciocínio lógico e a habilidade de resolver problemas.</p> 
            
            </div>
        
            <div class="info-adicionais">
            
                <h2>Informações Adicionais</h2>
            
                <p>INDICADO PARA CRIANÇAS: a partir de 5 anos</p>

                <p>CÓDIGO DE BARRAS: 7898927095093</p>

                <p>COMPOSIÇÃO: 46 peças de quebra cabeça que brilham no escuro.</p>

                <p>DIMENSÕES DO PRODUTO NA CAIXA: A 18 cm  X  L 25 cm  X  P 5 cm</p>

                <p>DIMENSÕES DO BRINQUEDO MONTADO: A 35 cm X L 40 cm</p>
                
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