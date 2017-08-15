<div class="cadastro content-cliente">

	<?php if( count($erros) > 0){ ?>
    	<ul class="alert alert-danger">
    		<?php foreach($erros as $erro){ ?>
    			<li><?=$erro?></li>
    		<?php } ?>
    	</ul>
    <?php } ?>
        
    <div class="alteracao-cadastro">
            
            <h2>Alteração Cadastral</h2>
            
            <?= form_open("cliente/cadastro_atualizar_post",array("class"=>""))?>
            
                <label>Nome Completo</label>
                <input type="text" class="nome form-control" name="nome" value="<?=$header["Cliente"]["Nome"]?>">

                <label>Email</label>
                <input type="text" class="email form-control" name="email" value="<?=$header["Cliente"]["Email"]?>">

                <label>Telefone (opcional)</label>
                <input type="text" class="telefone form-control" name="telefone" value="<?=$header["Cliente"]["Telefone"]?>">

                <input type="submit" value="Alterar" class="btn btn-primary">

            <?= form_close()?>
            
        </div>
        
    <div class="alteracao-senha">
        
        <h2>Alteração Senha</h2>
        
        <?= form_open("cliente/cadastro_alterarSenha_post",array("class"=>""))?>

            <label>Senha Anterior</label>
            <input type="password" class="senha form-control" name="senha-anterior">

            <label>Nova Senha</label>
            <input type="password" class="nova-senha form-control" name="nova-senha">

            <label>Confirmar Nova Senha</label>
            <input type="password" class="confirma-nova-senha form-control" name="confirma-nova-senha">

            <input type="submit" value="Alterar" class="btn btn-primary">

        <?= form_close()?>
        
    </div>
    
</div>   

<script src="<?= base_url("js/my_script-clienteCadastro.js")?>"></script>