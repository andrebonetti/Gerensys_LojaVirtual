<section class="cliente-cadastro my-content">
    <div class="myContainer">
        
        <h1>Cadastro</h1>
        
        <?= form_open("cliente/cadastro_post",array("class"=>""))?>
            
            <label>Nome Completo</label>
            <input type="text" class="nome form-control" name="nome">
            
            <label>Email</label>
            <input type="text" class="email form-control" name="email">
            
            <label>Telefone (opcional)</label>
            <input type="text" class="telefone form-control" name="telefone">
            
            <label>Senha</label>
            <input type="text" class="senha form-control" name="senha">
            
            <label>Confirmar Senha</label>
            <input type="text" class="confirma-senha form-control" name="confirma-senha">
            
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        
        <?= form_close()?>
        
    </div>
</section>