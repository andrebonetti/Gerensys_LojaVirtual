 <div class="endereco_form content-cliente">

	<?php if( count($erros) > 0){ ?>
    	<ul class="alert alert-danger">
    		<?php foreach($erros as $erro){ ?>
    			<li><?=$erro?></li>
    		<?php } ?>
    	</ul>
    <?php } ?>
        
    <h2>Incluir Endereço</h2>
    
    <?= form_open("cliente/enderecos_{$acao_form}_post",array("class"=>""))?>
    
        <input type="hidden" name="Id" value="<?php if(isset($dataCadastro["Id"])){echo $dataCadastro["Id"];} ?>"/>
    
        <label>CEP</label>
        <input type="text" class="cep form-control" name="cep" value="<?php if(isset($dataCadastro["CEP"])){echo $dataCadastro["CEP"];} ?>">
     
        <label>Rua</label>
        <input type="text" class="endereco form-control" name="endereco" value="<?php if(isset($dataCadastro["Endereco"])){echo $dataCadastro["Endereco"];} ?>">
        
        <label>Numero</label>
        <input type="text" class="numero form-control" name="numero" value="<?php if(isset($dataCadastro["Numero"])){echo $dataCadastro["Numero"];} ?>">
        
        <label>Complemento</label>
        <input type="text" class="complemento form-control" name="complemento" value="<?php if(isset($dataCadastro["Numero"])){echo $dataCadastro["Numero"];} ?>">
        
        <label>Bairro</label>
        <input type="text" class="bairro form-control" name="bairro" value="<?php if(isset($dataCadastro["Bairro"])){echo $dataCadastro["Bairro"];} ?>">
        
        <label>Estado</label>
        <input type="text" class="estado form-control" name="estado" value="<?php if(isset($dataCadastro["Estado"])){echo $dataCadastro["Estado"];} ?>">
        
        <label>Cidade</label>
        <input type="text" class="cidade form-control" name="cidade" value="<?php if(isset($dataCadastro["Cidade"])){echo $dataCadastro["Cidade"];} ?>">

        <input type="submit" value="<?=$acao_form?>" class="btn btn-primary alterar">

    <?= form_close()?>

</div>    

<script src="<?= base_url("js/my_script-clienteEnderecos.js")?>"></script>