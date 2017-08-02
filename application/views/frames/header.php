<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
             
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url("img/logo.png")?>" title="" >
        <title> <?=$title?> </title>
                      
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap.css")?>">  
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/style.css")?>">  
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/my_jassor.css")?>"> 
        <link rel="stylesheet" type="text/css" href="<?=base_url("css/thumbnail-navigator-with-arrows.source.css")?>"> 
        <link rel="stylesheet/less" href="<?=base_url("less/style.less")?>">    

        <script src="<?=base_url("js/jquery-2.1.3.min.js")?>"></script>
        <script src="<?=base_url("js/bootstrap.js")?>"></script>
        <script src="<?=base_url("js/my_script-header.js")?>"></script>
        <script src="<?=base_url("js/less.js")?>"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
        
	</head>

	<body>
        
        <header>  
        
            <div class="sup_header">
                
                <div class="myContainer">
                       
                    <?=anchor("home/index","Nome da Loja Virtual",array("class"=>"nome_empresa"))?>    
                    
                    <div class="menu">
                      <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?=base_url("img/menu.png")?>" class="menu_icon"></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="<?= atual_page($atual_page, "home")?>"><?= anchor("home","Home")?></li>
                                    <li class="<?= atual_page($atual_page, "empresa")?>"><?= anchor("empresa","Empresa")?></li>
                                    <li class="<?= atual_page($atual_page, "produtos")?> <?= atual_page($atual_page, "produto_descricao")?>" ><?= anchor("produtos","Produtos")?></li>
                                    <li class="<?= atual_page($atual_page, "contato")?>"><?= anchor("contato","Contato")?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                        
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
                    
                <nav class="nav_menu">
                    
                    <ul class="header-setor">
                        <?php for($n = 0;$n < count($header["lSetorHeader"]) && $n < 5;$n++){ ?>
						
                            <li class="header-setor-item">
                                
                            	<?=anchor("Produtos/Setor/{$header["lSetorHeader"][$n]["DescricaoSetor"]}/{$header["lSetorHeader"][$n]["IdSetor"]}/Pagina/1"
                            	,$header["lSetorHeader"][$n]["DescricaoSetor"]
                            	,array( "class" => produto_activeFiltroValor("IdSetor", $header["lSetorHeader"][$n]["IdSetor"])))?>
                                
                                <ul class="sub-nav1 header-grupo">
                                
                                    <?php foreach($header["lSetorHeader"][$n]["lGrupo"] as $itemGrupo){?>

                                        <li class="header-grupo-item">
                                            
                                            <?=anchor("Produtos/Produtos_Filtros_Temp/{$header["lSetorHeader"][$n]["IdSetor"]}/{$itemGrupo["IdGrupo"]}"
                                            ,$itemGrupo["DescricaoGrupo"])?>
                                            
                                            <img src="<?=base_url("img/Seta_direita.png")?>">
                                            
                                            <ul class="sub-nav2 header-subgrupo">

                                                <?php foreach($itemGrupo["lSubGrupo"] as $itemSubGrupo){?>

                                                    <li>
                                                         <?=anchor("Produtos/Produtos_Filtros_Temp/{$header["lSetorHeader"][$n]["IdSetor"]}/{$itemGrupo["IdGrupo"]}/{$itemSubGrupo["IdSubGrupo"]}"
                                                          ,$itemSubGrupo["DescricaoSubGrupo"])?>
                                                    </li>

                                                <?php } ?>

                                            </ul>
                                            
                                        </li>

                                    <?php } ?>

                                </ul>
                                
                            </li>

                        <?php } ?>
                        
                    </ul>    
                </nav>
                
                <div class="shop">
                    <?=anchor("carrinho","<img src='".base_url('img/shop.png')."'>")?>
                    <span class="quantidade">(<?=$header["QuantidadeCarrinho"]?>)</span>
                    <span class="valor"><?=numeroEmReais($header["ValorCarrinho"])?></span>
                </div>
                
                <div class="conta">
                
                	<?php if(empty($header["Cliente"])){ ?>
                    
                        <div class="sem-conta">
	                    
	                       <?=anchor("Cliente/cadastro_incluir_form","Cadastre-se",array("class" => "cadastrese"))?>
	                       <?=anchor("Cliente/login_form","Login",array("class" => "login"))?>
	                    
                        </div>    
                            
                    <?php } else {?>
                        
                        <div class="minha-conta">
                    	   
                            <div class="menu-conta">
                              <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= explode(" ", $header["Cliente"]["Nome"])[0] ?></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><?=anchor("cliente/pedidos","Pedidos",array("class"=>atual_page($atual_page, "pedidos")))?></li>
								            <li><?=anchor("cliente/favoritos","Favoritos",array("class"=>atual_page($atual_page, "favoritos")))?></li>
								            <li><?=anchor("cliente/cadastro_atualizar_form","Cadastro",array("class"=>atual_page($atual_page, "cliente_cadastro")))?></li> 
								            <li><?=anchor("cliente/enderecos","Endereços",array("class"=>atual_page($atual_page, "enderecos")))?></li> 
								            <li><?=anchor("cliente/pagamentos","Opções de Pagamento",array("class"=>atual_page($atual_page, "pagamentos")))?></li> 
								            <li><?=anchor("cliente/sair","Sair")?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <?php if($header["Cliente"]["Foto"] != ""){ ?>
				
                                <img class="com-foto" src="<?=base_url("img/Clientes/{$header["Cliente"]["Foto"]}")?>">

                            <?php } else {?>

                                <img class="no-foto" src="<?=base_url('img/User.png')?>">

                            <?php } ?>
                            
                        
                        </div>
                    
                    <?php } ?>
                    
                </div>
        		
        		
        	</div>
        
        </header>
        
        <?php if (!empty($this->session->flashdata('msg-sucesso'))){?>
    		<p class="alert alert-success alert-flash"><?=$this->session->flashdata('msg-sucesso')?></p>
    	<?php } ?>  
        
        <?php if (!empty($this->session->flashdata('msg-erro'))){?>
    		<p class="alert alert-danger alert-flash"><?=$this->session->flashdata('msg-erro')?></p>
    	<?php } ?>
        
        <?php produto_DestroySessaoFiltros($atual_page); ?>