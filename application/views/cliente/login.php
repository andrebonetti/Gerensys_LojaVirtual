<section class="cliente-login my-content">
    <div class="myContainer">
        
        <h1>Cadastro</h1>
        
        <?= form_open("cliente/login_post",array("class"=>""))?>
            
            <label>Email</label>
            <input type="text" class="email form-control" name="email">
            
            <label>Senha</label>
            <input type="text" class="senha form-control" name="senha">

            <input type="submit" value="Entrar" class="btn btn-primary">
        
        <?= form_close()?>
        
    </div>
</section>