 <div class="cadastro_form content-cliente">

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
    
        <label>Endereço</label>
        <input type="text" class="endereco form-control" name="endereco" value="<?php if(isset($dataCadastro["Endereco"])){echo $dataCadastro["Endereco"];} ?>">
        
        <label>Numero</label>
        <input type="text" class="numero form-control" name="numero" value="<?php if(isset($dataCadastro["Numero"])){echo $dataCadastro["Numero"];} ?>">
        
        <label>Complemento</label>
        <input type="text" class="complemento form-control" name="complemento" value="<?php if(isset($dataCadastro["Complemento"])){echo $dataCadastro["Complemento"];} ?>">
     
		<label>CEP</label>
        <input type="text" class="cep form-control" name="cep" value="<?php if(isset($dataCadastro["CEP"])){echo $dataCadastro["CEP"];} ?>">

        <input type="submit" value="<?=$acao_form?>" class="btn btn-primary">

    <?= form_close()?>

</div>    