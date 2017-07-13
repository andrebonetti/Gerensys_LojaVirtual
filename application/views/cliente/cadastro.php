<section class="cliente-cadastro my-content">
    <div class="myContainer">
        
        <h1>Cadastro</h1>
        
        <?php if( count($erros) > 0){ ?>
	    	<ul class="alert alert-danger">
	    		<?php foreach($erros as $erro){ ?>
	    			<li><?=$erro?></li>
	    		<?php } ?>
	    	</ul>
        <?php } ?>
        
        <?= form_open("cliente/cadastro_Inserir",array("class"=>""))?>
            
            <label>Nome Completo</label>
            <input type="text" class="nome form-control" name="nome" value="<?php if(isset($dataCadastro["Nome"])){ echo $dataCadastro["Nome"]; }?>"> 
            
            <label>Email</label>
            <input type="text" class="email form-control" name="email" value="<?php if(isset($dataCadastro["Email"])){ echo $dataCadastro["Email"]; }?>">
            
            <label>Telefone (opcional)</label>
            <input type="text" class="telefone form-control" name="telefone" value="<?php if(isset($dataCadastro["Telefone"])){ echo $dataCadastro["Telefone"]; }?>">
            
            <label>Senha</label>
            <input type="password" class="senha form-control" name="senha">
            
            <label>Confirmar Senha</label>
            <input type="password" class="confirma-senha form-control" name="confirma-senha">
            
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        
        <?= form_close()?>
        
    </div>
</section>