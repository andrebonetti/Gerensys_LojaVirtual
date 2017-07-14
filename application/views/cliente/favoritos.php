<div class="favoritos content-cliente">
        
    <h2>Favoritos</h2>
    
    <?= anchor("cliente/favoritos_excluirTodos","Excluir Todos",array("class"=>"excluir-todos btn btn-danger"))?>
    
    <div class="boxes">
            
        <?php foreach($lFavoritos as $itemFavorito){ 
        
            $itemProduto = $itemFavorito["Produto"];
         
         	//Promocao
         	$HasPromocao = false;
         	if($itemProduto["PromocaoPorcentagemDesconto"] > 0){
				
				$itemProduto["NovoPreco"] 	= produto_promocao_CalcularPromocao($itemProduto["PromocaoPorcentagemDesconto"],$itemProduto["Preco"]);
				
			}
         	if($itemProduto["PromocaoPrecoFixoDesconto"] > 0){
         		
         		$itemProduto["NovoPreco"] 	= $itemProduto["PromocaoPrecoFixoDesconto"];
         		
			}
        	
        	if( isset($itemProduto["NovoPreco"]) ){
				$preco = $itemProduto["NovoPreco"];
			}
			else{
				$preco = $itemProduto["Preco"];
			}
        	
        	//Parcela
         	$valorParcela 	= produto_CalcularParcela($itemProduto["NumeroMaximoParcelas"],$itemProduto["JurosAPartirDe"],$itemProduto["PorcentagemJuros"],$preco);
         	
         	?>
         
            <div class="master-box">

                <div class="box">
                    
                    <!-- Destaque Promocao -->
                    <?php if($itemProduto["PromocaoPorcentagemDesconto"] > 0){?>
                    	<p class="promocao"><?=$itemProduto["PromocaoPorcentagemDesconto"]?>% OFF</p>
                   <?php } ?> 
                   <?php if($itemProduto["PromocaoPrecoFixoDesconto"] > 0){?>
                    	<p class="promocao">- <?=numeroEmReais( ($itemProduto["NovoPreco"] - $itemProduto["Preco"])*-1) ?></p>
                   <?php } ?> 
                	
                    <!-- Imagem -->
                    <div class="img-content">
                    	<?=anchor("produtos/produto_descricao/".$itemProduto["Id"]," 
                    	<img src='".base_url("img/Produtos/".$itemProduto["FotoPrincipal"]."")."' alt='".$itemProduto['Descricao']."' title='".$itemProduto['Descricao']."'>
                    	<p class='detalhes_span'>+ Detalhes</p>")?>
                    </div>
                    
                    <!-- Descrição -->
                    <a href="#"><h3 class="nome-produto"><?=$itemProduto["Descricao"]?></h3></a>
                    
                    <!-- Preco -->
                    <?php if( ($itemProduto["PromocaoPorcentagemDesconto"] == null) && ($itemProduto["PromocaoPrecoFixoDesconto"] == null)) {?>
                    	<p class="preco"><?=numeroEmReais($itemProduto["Preco"])?></p>
                    <?php } else{?>
                     
                     	<p class="preco-antigo"><?=numeroEmReais($itemProduto["Preco"])?></p>
                		<p class="preco-novo"><?=numeroEmReais($itemProduto["NovoPreco"])?></p>
                     
                    <?php }?>
                    
                    <!-- Parcela -->
                    <?php if($valorParcela != 0){ ?>
                    	<p class="parcela"><?=$itemProduto["NumeroMaximoParcelas"]?> <span class="no-negrito">de</span> <?=numeroEmReais($valorParcela)?></p>
					<?php } ?>
					
                </div>

            </div>
        
        <?php } ?>
        
    </div>
    
</div>    