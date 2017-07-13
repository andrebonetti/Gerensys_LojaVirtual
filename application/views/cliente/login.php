<section class="cliente-login my-content">
    <div class="myContainer">
        
        <h1>Cadastro</h1>
        
        <div class="login">
        	
        	<?php if( count($erros) > 0){ ?>
	        	<ul class="alert alert-danger">
		    		<?php foreach($erros as $erro){ ?>
		    			<li><?=$erro?></li>
		    		<?php } ?>
		    	</ul>
            <?php } ?>
            
            <h2>Ja tenho cadastro</h2>
                     
            <?= form_open("cliente/login_post",array("class"=>""))?>

                <label>Email</label>
                <input type="text" class="email form-control" name="email" value="<?php if(isset($dataCadastro["Email"])){ echo $dataCadastro["Email"]; }?>">

                <label>Senha</label>
                <input type="password" class="senha form-control" name="senha" value="<?php if(isset($dataCadastro["Senha"])){ echo $dataCadastro["Senha"]; }?>">

                <input type="submit" value="Entrar" class="btn btn-primary">

            <?= form_close()?>
            
        </div>    
        
        <div class="cadastrar">
        
            <h2>Não tenho cadastro</h2>
            
            <h3>Criar Cadastro</h3>
            <ul>
                <li>Receba promoções e ofertas exclusivas</li>
                <li>Agilize suas compras com 1 clique</li>
                <li>Salve seus dados e facilite compras futuras</li>
            </ul>
            
            <?= form_open("cliente/cadastro",array("class"=>""))?>
            
                <label>Email</label>
                <input type="text" class="email form-control" name="email">
         
                <input type="submit" value="Criar Cadastro" class="btn btn-primary">
                
            <?= form_close()?>
            
        </div>
        
    </div>
</section>