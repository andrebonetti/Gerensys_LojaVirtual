<div class="enderecos content-cliente">
        
    <h2>Endereços</h2>
    
    <table class="table table-striped">
        
        <thead>
        
            <tr>
            
                <th class="relevancia">Relevância</th>
                <th class="endereco">Endereço</th>
                <th class="complemento">Complemento</th>
                <th class="cep">CEP</th>
                <th class="acoes">Ações</th>
                
            </tr>
        
        </thead>
        
        <tbody>
        
        	<?php foreach($cliente_enderecos as $itemEndereco) { ?>
                <tr>
                
                    <td class="relevancia">
                    	<?php if($itemEndereco["IsPrincipal"] == true){ ?>
                    		<button class="btn btn-success">Principal</button>
                    	<?php } else {?> 
                    		<?= anchor("cliente/enderecos_tornarPrincipal/{$itemEndereco["Id"]}","Tornar Principal",array("class"=>"btn btn-default" ))?>
                    	<?php } ?> 
                    </td>
                    <td class="endereco"><?=$itemEndereco["Endereco"]?></td>
                    <td class="complemento"><?=$itemEndereco["Numero"]?> - <?=$itemEndereco["Complemento"]?></td>
                    <td class="cep"><?=$itemEndereco["CEP"]?></td>
                    <td class="acoes">
                    	<?=anchor("cliente/enderecos_excluir/{$itemEndereco["Id"]}","<img src=".base_url("img/delete.png").">")?>
                        <?=anchor("cliente/enderecos_atualizar_form/{$itemEndereco["Id"]}","<img src=".base_url("img/edit_blue.png").">")?>
                    </td>
                    
                </tr>
            <?php } ?>
            
        </tbody>
    
    </table>
    
    <?=anchor("cliente/enderecos_incluir_form","Adicionar Novo Endereço",array("class"=>"btn btn-primary"))?>

</div>    