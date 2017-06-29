<div class="pagamentos content-cliente">
        
    <h2>Endereços</h2>
    
    <table class="table table-striped">
        
        <thead>
        
            <tr>
            
                <th class="tipo">Tipo</th>
                <th class="numero">Número</th>
                <th class="data-validade">Data de Validade</th>
                <th class="nome-titular">Nome do Titular</th>
                <th class="endereço-cobranca">Endereço de Cobrança</th>
                <th class="acoes"></th>
                
            </tr>
        
        </thead>
        
        <tbody>
        
            <tr>
            
                <td class="tipo">(Crédito) MasterCard</td>
                <td class="numero">***************9949</td>
                <td class="data-validade">02/2018</td>
                <td class="nome-titular">Nome Titular Cartão</td>
                <td class="endereço-cobranca">Rua André Ansaldo, 2A</td>
                <td class="acoes">
                    <?=anchor("cliente/enderecos_edit","<img src=".base_url("img/edit_blue.png").">")?>
                    <?=anchor("cliente/enderecos_delete","<img src=".base_url("img/delete.png").">")?>
                </td>
                
            </tr>
            
            <tr>
            
                <td class="tipo">(Crédito) Visa</td>
                <td class="numero">***************1005</td>
                <td class="data-validade">11/2019</td>
                <td class="nome-titular">Nome Titular Cartão</td>
                <td class="endereço-cobranca">Rua André Ansaldo, 2A</td>
                <td class="acoes">
                    <?=anchor("cliente/enderecos_edit","<img src=".base_url("img/edit_blue.png").">")?>
                    <?=anchor("cliente/enderecos_delete","<img src=".base_url("img/delete.png").">")?>
                </td>
                
            </tr>
        
        </tbody>
    
    </table>
    
    <button class="btn btn-primary">Adicionar nova Forma de Pagamento</button>
    
</div>   