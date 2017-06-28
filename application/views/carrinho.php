<section class="carrinho my-content">
    <div class="myContainer">
        
        <h1>Carrinho</h1>
        
        <table class="table table-striped">

            <thead>
                <tr>
                    <th class="imagem">Imagem</th>
                    <th class="nome">Produto</th>
                    <th class="quantidade">Quantidade</th>
                    <th class="preco-unitario">Preço</th>
                    <th class="preco-subTotal">SubTotal</th>
                    <th class="delete"></th>
                </tr>
            </thead>

            <tbody>

                <?php for($n = 1; $n <= 5;$n++){ ?>

                    <tr data-item-id="{{ item.id }}">

                        <!-- IMAGEM -->
                        <td class="imagem">
                            <a  href="#">
                                <div class="img-teste">
                                    Imagem Teste
                                </div>
                            </a>
                        </td>

                        <!-- NOME -->
                        <td class="nome">
                            Nome do Produto <?=$n?>
                        </td>

                        <!-- QUANTIDADE -->
                        <td class="quantidade">

                            <input type="text" class="form-control" name="quantidade" value="1"/>  
                            <div class="opcoes">
                                <img class="plus" src="<?=base_url("img/plus.png")?>">
                                <img class="less" src="<?=base_url("img/less.png")?>">
                            </div>    
                        </td>

                        <!-- PREÇO UNITARIO -->
                        <td class="preco-unitario">
                            39,99
                        </td>

                        <!--PRECO SUB_TOTAL-->
                        <td class="preco-subTotal">
                           39,99 
                        </td>

                        <!--DELETAR-->
                        <td class="delete">
                            <a href="#"> <img src="<?=base_url("img/delete.png")?>"> </a>
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
                Total: R$<span class="Preco-total">100,00</span>
            </div>
            
            <div class="opcoes">
                <?=anchor("produtos","Continuar Comprando",array("class"=>"btn btn-primary"))?>
                <?=anchor("#","Finalizar Compra",array("class"=>"btn btn-danger"))?>
            </div>    
        </div>
        
    </div>
</section>