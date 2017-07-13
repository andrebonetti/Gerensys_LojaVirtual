<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
             
        <link rel="shortcut icon" type="image/x-icon" href="<" title="" >
        <title> Base </title>
                      
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap.css")?>">  
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/style.css")?>">  
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/my_jassor.css")?>"> 
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/thumbnail-navigator-with-arrows.source.css")?>"> 
        <link rel="stylesheet/less" href="<?=base_url("less/style.less")?>">    

        <script src="<?=base_url("js/jquery-2.1.3.min.js")?>"></script>
        <script src="<?=base_url("js/bootstrap.js")?>"></script>
        <script src="<?=base_url("js/less.js")?>"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
        
	</head>

	<body>
        
        <header>  
        
            <div class="sup_header">
                
                <div class="myContainer">
                        
                    <p class="nome_empresa">Nome da Loja Virtual</p>
                        
                    <div class="telefones">
                        <img src="<?=base_url('img/tel_icon.png')?>">
                        <span>(11) 2956-6980  </span>
                        <span>/</span>
                        <span>(11) 2956-5051</span>
                    </div>
                    
                    <?= form_open("imoveis/imovel_busca",array("name"=>"busca-rapida"))?>
                
                        <input type="text" class="form-control buscar-text" name="busca" placeholder="Buscar"> 

                        <input type="submit" class="search" value="">

                    <?= form_close()?>
                    
                </div>    
                
            </div>
            
        	<div class="myContainer header_principal">
        		
        		<div class="banner">
                    <?=anchor("home","<img src='".base_url('img/logo.png')."'>")?>
                </div>
                    
                <nav>
                    <ul>
                        <li class="<?= atual_page($atual_page, "home")?>"><?= anchor("home","Home")?></li>
                        <li class="<?= atual_page($atual_page, "empresa")?>"><?= anchor("empresa","Empresa")?></li>
                        <li class="<?= atual_page($atual_page, "produtos")?> <?= atual_page($atual_page, "produto_descricao")?>" ><?= anchor("produtos","Produtos")?></li>
                        <li class="<?= atual_page($atual_page, "contato")?>"><?= anchor("contato","Contato")?></li>
                    </ul>    
                </nav>
                
                <div class="shop">
                    <?=anchor("carrinho","<img src='".base_url('img/shop.png')."'>")?>
                    <span class="quantidade">(0)</span>
                    <span class="valor">R$0,00</span>
                </div>
                <div class="conta">
                
                	<?php if(empty($cliente)){ ?>
                    
                        <div class="sem-conta">
	                    
	                       <?=anchor("Cliente/cadastro","Cadastre-se",array("class" => "cadastrese"))?>
	                       <?=anchor("Cliente/login","Login",array("class" => "login"))?>
	                    
                        </div>    
                            
                    <?php } else {?>
                        
                        <div class="minha-conta">
                    	   
                            <div class="menu-conta">
                              <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php/*$cliente["Nome"]*/?>André</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><?=anchor("cliente/pedidos","Pedidos")?></li>
                                            <li><?=anchor("cliente/favoritos","Favoritos")?></li>
                                            <li><?=anchor("cliente/cadastro_edit","Cadastro")?></li> 
                                            <li><?=anchor("cliente/enderecos","Endereços")?></li> 
                                            <li><?=anchor("cliente/pagamentos","Opções de Pagamento")?></li> 
                                            <li><?=anchor("cliente/sair","Sair")?></li> 
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <?php if($cliente["Foto"] != ""){ ?>
				
                                <img class="com-foto" src="<?=base_url("img/Clientes/{$cliente["Foto"]}")?>">

                            <?php } else {?>

                                <img class="no-foto" src="<?=base_url('img/User.png')?>">

                            <?php } ?>
                            
                        
                        </div>
                    
                    <?php } ?>
                    
                </div>
        		
        		
        	</div>
        
        </header>
        
        <?php produto_DestroySessaoFiltros($atual_page); ?>