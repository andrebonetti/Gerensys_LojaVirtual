<div class="pedidos content-cliente">
        
    <h2>Pedidos</h2>      
        
    <table class="table table-striped">
    
        <thead>
        
            <tr>
                <th>Número</th>
                <th>Valor Total</th>
                <th>Qtde Produtos</th>
                <th>Data Pedido</th>
                <th>Data Entrega</th>
                <th>Status</th>
                <th></th>
            </tr>
            
        </thead>
        
        <tbody>
            
            <?php foreach($lPedidos as $itemPedido){?>
                
                <tr>
                
                    <td><?=$itemPedido["Numero"]?></td>
                    <td><?=$itemPedido["ValorTotal"]?></td>
                    <td><?=$itemPedido["QtdeProdutos"]?></td>
                    <td><?=$itemPedido["DataPedido"]?></td>
                    <td>
                    
                        <?php if($itemPedido["DataEntrega"] != null){?>    
                            <?=$itemPedido["DataEntrega"]?>
                        <?php } else { ?>
                            ---
                        <?php } ?>
                        
                    </td>
                    <td>Aguardando Pagamento</td>
                    <td><a href="#">+ Detalhes</a></td>
                           
                </tr>
                
            <?php } ?>
            
        </tbody>
        
    </table>
    
</div>