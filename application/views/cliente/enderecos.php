<div class="enderecos content-cliente">
        
    <h2>Endereços</h2>
    
    <table class="table table-striped">
        
        <thead>
        
            <tr>
            
                <th class="tipoendereco">Tipo Endereço</th>
                <th class="relevancia">Relevância</th>
                <th class="endereco">Endereço</th>
                <th class="acoes"></th>
                
            </tr>
        
        </thead>
        
        <tbody>
        
            <tr>
            
                <td class="tipoendereco">Endereço 1</td>
                <td class="relevancia"><button class="btn btn-primary">Principal</button></td>
                <td class="endereco">Rua André Ansaldo, 2A</td>
                <td class="acoes">
                     <?=anchor("cliente/enderecos_edit","<img src=".base_url("img/edit_blue.png").">")?>
                    <?=anchor("cliente/enderecos_delete","<img src=".base_url("img/delete.png").">")?>
                </td>
                
            </tr>
            
            <tr>
            
                <td class="tipoendereco">Endereço 2</td>
                <td class="relevancia"><button class="btn btn-default">Tornar Principal</button></td>
                <td class="endereco">Rua Cândido Borges Monteiro, 13A</td>
                <td class="acoes">
                    <?=anchor("cliente/enderecos_edit","<img src=".base_url("img/edit_blue.png").">")?>
                    <?=anchor("cliente/enderecos_delete","<img src=".base_url("img/delete.png").">")?>
                </td>
                
            </tr>
        
        </tbody>
    
    </table>
    
    <button class="btn btn-primary">Adicionar novo Endereço</button>
    
</div>    