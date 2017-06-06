<section class="produtos my-content">
    <div class="myContainer">
        
        <h1>Produtos: </h1>
        
        <aside>
            <h2>Menu: </h2>
        </aside>    
        
        <div class="boxes">
            
            <?php if(count($produtos) == "0"){?>
                <p class="alert alert-warning">Não encontramos produtos com essas especificações</p>
            <?php } ?>
            
            <?php foreach($produtos as $produto){ ?>
                <div class="box">
                    <?= anchor("produtos/produto_descricao/".$produto['id']."","
                    <img src='".base_url("img/produtos/".$produto["imagem_principal"]."")."'>
                    <h3>".$produto["nome"]."</h3>
                    ")?>
                </div>
            <?php } ?>
            
        </div>
    </div>
</section>