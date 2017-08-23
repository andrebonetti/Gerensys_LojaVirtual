<div class="favoritos content-cliente">
        
    <h2>Favoritos</h2>
    
    <?= anchor("cliente/favoritos_excluirTodos","Excluir Todos",array("class"=>"excluir-todos btn btn-danger"))?>
    
    <div class="boxes">
    
        <?php foreach($lFavoritos as $itemFavorito){ 
        
            $produto = produto_prepararConteudoMenu($itemFavorito["Produto"]);
                     
            // VIEW BOX
            $this->view("snipplets/box.php",$content = array("produto" => $produto,"favorito" => $itemFavorito)); 
                    
        } ?>
        
    </div>
    
</div> 

<!--<script src="<?= base_url("js/my_script-clienteFavoritos.js")?>"></script>--?>