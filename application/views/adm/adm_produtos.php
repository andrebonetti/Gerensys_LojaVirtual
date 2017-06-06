<section class="home my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <?=var_dump($lProdutos);?>
        
        <h2>Cadastrar Produtos</h2>
        
        <?= form_open("adm_produtos/Incluir",array("class"=>"link-update"))?>
        
        	<!-- DIA -->

                <input type="text" name="dataCompra" class="dataCompra-edit form-control" placeholder="DD/MM/AAAA">

                <select name="categoria" class="categoria_modal categoria-atual form-control">       
                    <option>Escolha a Categoria</option>
                    <?php foreach($categorias as $categoria){?>
                        <option value="<?=$categoria["IdCategoria"]?>"><?=$categoria["DescricaoCategoria"]?></option>
                    <?php } ?>
                    <option value="nova-categoria">Adicionar Categoria</option>
                </select>
				
				<select name="sub_categoria" class="subcategoria_modal sub_categoria-atual form-control">
                    <option>Escolha a Sub Categoria</option>
                    <?php foreach($all_sub_categorias as $sub_categoria){?>
                        <option value="<?=$sub_categoria["IdSubCategoria"]?>" class="option_SubCategoria" name="<?=$sub_categoria["IdCategoria"]?>"><?=$sub_categoria["DescricaoSubCategoria"]?></option>
                    <?php } ?>
                    <option value="nova-sub_categoria">Adicionar Sub_categoria</option>
                </select>
                    
        
        <?= form_close()?>
        
    </div>
</section>