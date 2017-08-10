<section class="carrinho my-content">
    <div class="myContainer">
        
        <h1>Carrinho</h1>
        
        <?php if(count($lCarrinho) > 0){?>
            
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
                        <th class="delete"><?=anchor("carrinho/limpar_carrinho","Limpar Tudo")?></th>
                    </tr>
                </thead>
                
                <tbody>

                <?php foreach($lCarrinho as $itemCarrinho){ ?>
                
                    <tr>
                        
                        <!-- N -->
                        <td class="item" value="<?=$itemCarrinho["Produto"]["Id"]?>">
                            <?=$itemCarrinho["Count"]?>
                        </td>
                        
                        <!-- IMAGEM -->
                        <td class="imagem">
                            <?=anchor("produtos/produto_descricao/{$itemCarrinho["Produto"]["Id"]}","<img src='".base_url("img/Produtos/{$itemCarrinho["Produto"]["FotoPrincipal"]}")."'>")?>
                        </td>

                        <!-- NOME -->
                        <td class="nome">
                            <?=$itemCarrinho["Produto"]["Descricao"]?>
                        </td>
                        
                        <!-- VARIANTES -->
                        <td class="variantes">
                        
                            <?php if( isset($itemCarrinho["IdTamanho"]) ){ ?>
                                <select class="form-control">
                                    <option value="<?=$itemCarrinho["IdTamanho"]?>">Tamanho - <?=$itemCarrinho["DescricaoTamanho"]?></option>   

                                    <?php foreach($itemCarrinho["Produto"]["lVariantes"]["lTamanho"] as $itemTamanho){ ?>

                                        <?php if($itemCarrinho["IdTamanho"] != $itemTamanho["IdTamanho"]) { ?>
                                            <option value="<?=$itemTamanho["IdTamanho"]?>">Tamanho - <?=$itemTamanho["DescricaoTamanho"]?></option>
                                        <?php } ?> 

                                    <?php } ?>

                                </select>
                            <?php } ?>
                            
                            <?php if( isset($itemCarrinho["IdCor"]) ){ ?>
                                <select class="form-control">
                                    <option value="<?=$itemCarrinho["IdCor"]?>">Cor - <?=$itemCarrinho["DescricaoCor"]?></option>   

                                    <?php foreach($itemCarrinho["Produto"]["lVariantes"]["lCor"] as $itemCor){ ?>

                                        <?php if($itemCarrinho["IdCor"] != $itemCor["IdCor"]) { ?>
                                            <option value="<?=$itemCor["IdCor"]?>">Cor - <?=$itemCor["DescricaoCor"]?></option>
                                        <?php } ?> 

                                    <?php } ?>

                                </select>
                            <?php } ?>
                            
                        </td>

                        <!-- QUANTIDADE -->
                        <td class="quantidade">

                            <input type="text" class="input-qtde form-control" name="quantidade" value="<?=$itemCarrinho["Quantidade"]?>"/>  
                            <div class="opcoes">
                                <img class="plus" src="<?=base_url("img/plus.png")?>">
                                
                                <?php if($itemCarrinho["Quantidade"] > 1 ){?>
                                    <img class="less" src="<?=base_url("img/less.png")?>">
                                <?php } else { ?>
                                    <?=anchor("carrinho/excluir_produto_carrinho/{$itemCarrinho["Count"]}","<img class='less' src='".base_url("img/less.png")."' >")?>
                                <?php } ?>
                                
                            </div>    
                        </td>

                        <!-- PREÇO UNITARIO -->
                        <td class="preco-unitario" value="<?=$itemCarrinho["Produto"]["Preco"]?>">
                            <?=numeroEmReais($itemCarrinho["Produto"]["Preco"])?>
                        </td>

                        <!--PRECO SUB_TOTAL-->
                        <td class="preco-subTotal subTotal-<?=$itemCarrinho["Count"]?>">
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
                    Total: R$<span class="Preco-total"><?=numeroEmReais($header["ValorCarrinho"])?></span>
                </div>
                
                <div class="opcoes">
                <?=anchor("produtos","Continuar Comprando",array("class"=>"btn btn-primary"))?>
                
                <?=form_open("Cliente/pedidos_incluir_post")?>
                
                    <input type="hidden" name="QuantidadeCarrinho" value="<?=$header["QuantidadeCarrinho"]?>" />
                    <input type="hidden" name="ValorCarrinho" value="<?=$header["ValorCarrinho"]?>" />
                
                    <?php $n = 1; foreach($lCarrinho as $itemCarrinho){ ?>
                    
                        <input type="hidden" name="IdProduto<?=$n?>" value="<?=$itemCarrinho["Produto"]["Id"]?>"/>
                    
                    <?php $n++; } ?>
                    
                    <input type="submit" value="Finalizar Compra" class="btn btn-danger"/>
                    
                <?=form_close()?>
                    
            </div> 
       
            </div>
        
        <?php } else { ?>
        
            <p class="alert alert-warning">Não existe nenhum produto no Carrinho!</p>
        
        <?php } ?>
        
    </div>
</section>

<script src="<?=base_url("js/my_script-carrinho.js")?>"></script> 