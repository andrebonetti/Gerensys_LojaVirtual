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
                    
                    // VIEW BOX
                    $this->view("snipplets/box.php",$content = array("produto" => $produto)); 
                    
                } ?>
            
            </div>
            
        </div>
        
        <!-- NOVIDADES -->
        <div class="Novidades">
            
            <h2>Novidades</h2>
            
            <div class="boxes">
                
                <?php foreach($lNovidade as $itemNovidade){
                	
                	$produto = produto_prepararConteudoMenu($itemNovidade);
                    
                    // VIEW BOX
                    $this->view("snipplets/box.php",$content = array("produto" => $produto)); 
                    
                } ?>
            
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