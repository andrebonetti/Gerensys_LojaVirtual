<section class="area-cliente my-content">
    <div class="myContainer">
        
        <div class="header-cliente">
            
            <h1>Sua Conta</h1>
            
            <div class="dados-conta">
            
                <div class="dados">                
                    <p class="nome"><?=$header["Cliente"]["Nome"]?></p>
                    <p class="email"><?=$header["Cliente"]["Email"]?></p>
                </div>
				
				<?php if($header["Cliente"]["Foto"] != ""){ ?>
				
					<img class="no-foto" src="<?=base_url("img/Clientes/{$header["Cliente"]["Foto"]}")?>">
				
				<?php } else {?>
				
					<img class="no-foto" src="<?=base_url("img/User_branco.png")?>">
				
				<?php } ?>
				
    
            </div>
            
        </div>
        
        <aside class="menu">
        
            <?=anchor("cliente/pedidos","Pedidos",array("class"=>atual_page($atual_page, "pedidos")))?> 
            <?=anchor("cliente/favoritos","Favoritos ({$headerCliente["CountFavoritos"]})",array("class"=>atual_page($atual_page, "favoritos")))?> 
            <?=anchor("cliente/cadastro_atualizar_form","Cadastro",array("class"=>atual_page($atual_page, "cliente_cadastro")))?> 
            <?=anchor("cliente/enderecos","Endereços",array("class"=>atual_page($atual_page, "enderecos")))?> 
            <?=anchor("cliente/pagamentos","Opções de Pagamento",array("class"=>atual_page($atual_page, "pagamentos")))?> 
            <?=anchor("cliente/sair","Sair")?>
             
        </aside>