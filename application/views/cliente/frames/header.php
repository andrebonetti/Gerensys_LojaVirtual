<section class="area-cliente my-content">
    <div class="myContainer">
        
        <div class="header-cliente">
            
            <h1>Sua Conta</h1>
            
            <div class="dados-conta">
            
                <div class="dados">                
                    <p class="nome">Nome Cliente</p>
                    <p class="email">EmailCliente@email.com.br</p>
                </div>

                <div class="img-teste">Imagem Teste</div>
                
            </div>
            
        </div>
        
        <aside class="menu">
        
            <?=anchor("cliente","Pedidos",array("class"=>atual_page($atual_page, "pedidos")))?> 
            <?=anchor("cliente/cadastro","Cadastro",array("class"=>atual_page($atual_page, "cadastro")))?> 
            <?=anchor("cliente/enderecos","Endereços",array("class"=>atual_page($atual_page, "enderecos")))?> 
            <?=anchor("cliente/pagamentos","Opções de Pagamento",array("class"=>atual_page($atual_page, "pagamentos")))?> 
            
        </aside>