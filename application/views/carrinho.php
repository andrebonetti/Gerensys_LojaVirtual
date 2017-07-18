<section class="carrinho my-content">
    <div class="myContainer">
        
        <h1>Carrinho</h1>
        
        <?php if(count($lCarrinho) > 0){?>
            
            <table class="table table-striped">
            <thead>
                <tr>
                    <th class="imagem">Imagem</th>
                    <th class="nome">Produto</th>
                    <th class="quantidade">Quantidade</th>
                    <th class="preco-unitario">Preço</th>
                    <th class="preco-subTotal">SubTotal</th>
                    <th class="delete"><?=anchor("carrinho/limpar_carrinho","Limpar Tudo")?></th>
                </tr>
            </thead>

            <tbody>
            
                <?php foreach($lCarrinho as $itemCarrinho){ ?>
                    
                    <tr>

                        <!-- IMAGEM -->
                        <td class="imagem">
                            <?=anchor("produtos/produto_descricao/{$itemCarrinho["Produto"]["Id"]}","<img src='".base_url("img/Produtos/{$itemCarrinho["Produto"]["FotoPrincipal"]}")."'>")?>
                        </td>

                        <!-- NOME -->
                        <td class="nome">
                            <?=$itemCarrinho["Produto"]["Descricao"]?>
                        </td>

                        <!-- QUANTIDADE -->
                        <td class="quantidade">

                            <input type="text" class="form-control" name="quantidade" value="<?=$itemCarrinho["Quantidade"]?>"/>  
                            <div class="opcoes">
                                <img class="plus" src="<?=base_url("img/plus.png")?>">
                                <img class="less" src="<?=base_url("img/less.png")?>">
                            </div>    
                        </td>

                        <!-- PREÇO UNITARIO -->
                        <td class="preco-unitario">
                            <?=numeroEmReais($itemCarrinho["Produto"]["Preco"])?>
                        </td>

                        <!--PRECO SUB_TOTAL-->
                        <td class="preco-subTotal">
                           <?=numeroEmReais($itemCarrinho["SubTotal"])?>
                        </td>

                        <!--DELETAR-->
                        <td class="delete">
                            <?=anchor("carrinho/excluir_produto_carrinho/{$itemCarrinho["Count"]}","<img src='".base_url("img/delete.png")."'>")?>
                        </td>

                    </tr>
                
                <?php } ?>

            </tbody>
                
        </table>

             <div class="calculo-frete">

                <h2>Calculo de Frete</h2>
                <input type="text" class="form-control" id="cep" placeholder="CEP">
                <button class="calcular-frete" >Calcular Frete</button>

            </div>
            
            <div class="finalizacao-compra">
                
                <div class="total">
                    Total: R$<span class="Preco-total"><?=numeroEmReais($valorTotal)?></span>
                </div>
                
                <div class="opcoes">
                <?=anchor("produtos","Continuar Comprando",array("class"=>"btn btn-primary"))?>
                <?=anchor("#","Finalizar Compra",array("class"=>"btn btn-danger"))?>
            </div> 
       
            </div>
        
        <?php } else { ?>
        
            <p class="alert alert-warning">Não existe nenhum produto no Carrinho!</p>
        
        <?php } ?>
        
    </div>
</section>