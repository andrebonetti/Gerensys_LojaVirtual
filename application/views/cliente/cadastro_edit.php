<div class="cadastro content-cliente">
        
    <div class="alteracao-cadastro">
            
            <h2>Alteração Cadastral</h2>
            
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

                <input type="submit" value="Alterar" class="btn btn-primary">

            <?= form_close()?>
            
        </div>
        
        <div class="alteracao-senha">
            
            <h2>Alteração Senha</h2>
            
            <?= form_open("cliente/alteracao_senha_post",array("class"=>""))?>

                <label>Senha Anterior</label>
                <input type="text" class="nome form-control" name="nome">

                <label>Nova Senha</label>
                <input type="text" class="email form-control" name="email">

                <label>Confirmar Nova Senha</label>
                <input type="text" class="telefone form-control" name="telefone">

                <input type="submit" value="Alterar" class="btn btn-primary">

            <?= form_close()?>
            
        </div>
    
</div>    