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
        
        <div class="preco-content">
        
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
        
        <?php if( isset($favorito)) { ?>
            
            <?=anchor("cliente/favoritos_excluir/{$favorito["Id"]}}","<img src='".base_url("img/less_1.png")."'>",array("data-toggle"=>"tooltip","title"=>"Remover da Lista","class"=>"favoritos_remover"))?>
					
        <?php } ?>
    	
    </div>

    </div> 