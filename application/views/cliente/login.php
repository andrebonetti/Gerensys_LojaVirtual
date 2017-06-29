<section class="cliente-login my-content">
    <div class="myContainer">
        
        <h1>Cadastro</h1>
        
        <div class="login">
            
            <h2>Ja tenho cadastro</h2>
            
            <?= form_open("cliente/login_post",array("class"=>""))?>

                <label>Email</label>
                <input type="text" class="email form-control" name="email">

                <label>Senha</label>
                <input type="text" class="senha form-control" name="senha">

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