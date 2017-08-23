<div class="pedido-detalhes content-cliente">
        
    <h2>Pedido - Detalhes</h2>      
        
    <table class="table table-striped">
    
        <thead>
        
            <tr>
                <th class="item">Item</th>
                <th class="imagem">Imagem</th>
                <th class="nome">Produto</th>
                <th class="variantes">Variantes</th>
                <th class="quantidade">Quantidade</th>
                <th class="preco-unitario">Preço</th>
                <th class="preco-subTotal">SubTotal</th>
                <th class="acoes"></th>
            </tr>
            
        </thead>
        
        <tbody>
            
            
            <?php $n = 1; foreach($lProdutos as $itemProduto){?>
            
                <tr>
                    
                    <!-- N -->
                    <td class="item">
                        <?=$n?>
                        <span class="idProduto"><?=$itemProduto["Produto"]["Id"]?></span>
                    </td>
                    
                    <!-- IMAGEM -->
                    <td class="imagem">
                        <?=anchor("produtos/produto_descricao/{$itemProduto["Produto"]["Id"]}","<img src='".base_url("img/Produtos/{$itemProduto["Produto"]["FotoPrincipal"]}")."'>")?>
                    </td>

                    <!-- NOME -->
                    <td class="nome">
                        <?=$itemProduto["Produto"]["Descricao"]?>
                    </td>
                    
                    <!-- VARIANTES -->
                    <td class="variantes">
                        
                       <?php if( $itemProduto["IdTamanho"] != null ){ ?>
                        
                            <span class="titulo">Tamanho</span> - <?=$itemProduto["DescricaoTamanho"]?><br>
                        
                       <?php } ?>
                       <?php if( $itemProduto["IdCor"] != null ){ ?>
                        
                            <span class="titulo">Cor</span> - <?=$itemProduto["DescricaoCor"]?>
                        
                        <?php } ?>    
                        
                        
                    </td>

                    <!-- QUANTIDADE -->
                    <td class="quantidade">
                        
                        <?=$itemProduto["Qtde"]?> 
                        
                    </td>

                    <!-- PREÇO UNITARIO -->
                    <td class="preco-unitario" value="<?=$itemProduto["Produto"]["Preco"]?>">
                        <?=numeroEmReais($itemProduto["Produto"]["Preco"])?>
                    </td>

                    <!--PRECO SUB_TOTAL-->
                    <td class="preco-subTotal">
                    
                        <?php $subTotal = ($itemProduto["Produto"]["Preco"] * $itemProduto["Qtde"]) ?>
                    
                       <?=numeroEmReais($subTotal)?>
                       
                    </td>

                    <!--DELETAR-->
                    <td class="acoes">
                        
                        <img data-toggle="modal" data-target="#mdlClassificacao" class="comentario" src="<?=base_url("img/comentario_icon.png")?>">
                       
                    </td>
                           
                </tr>
                
            <?php $n++; } ?>
            
        </tbody>
        
    </table>
    
</div>

<div class="modal fade" id="mdlClassificacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Contato</h4>
          </div>
          <div class="modal-body">

            TESTE

          </div>
        </div>
    </div>
</div>
