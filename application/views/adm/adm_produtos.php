<section class="home my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <h2>Cadastrar Produtos</h2>
        
        <?= form_open("adm_produtos/Incluir",array("class"=>"link-update"))?>
        
        	<!-- CODIGO -->	
			<div class="Codigo">
                
            	<div class="CodigoPrincipal">
            		<label>Código</label>    
                	<input type="text" id="Codigo" name="Codigo" tabela="tb_produto" coluna="Codigo" status="0" class="form-control com_opcoes input_validacao" maxlength="50">
                    <div class="input-options">
                        
                        <!-- STATUS -->
                        <div class="input-status">
                            
                            <!-- ICON - OBRIGATORIO -->
                            <img class="input-icon input-obrigatorio icon_notfocus" src="<?=base_url("img/asterisk_red.png")?>" data-toggle="tooltip" data-html="true" title="<span class='input-info'>Campo Obrigatorio</span>">
                            
                            <img class="input-icon input-obrigatorio icon_onfocus only_onFocus" src="<?=base_url("img/asterisk_orange.png")?>" data-toggle="tooltip" data-html="true" title="<span class='input-info'>Campo Obrigatorio</span>">
                            
                            <!-- STATUS -->
                            <img class="input-icon input-status-icon icon-correto" src="<?=base_url("img/correto_green.png")?>">
                            
                            <img class="input-icon input-status-icon icon-erro" src="<?=base_url("img/alert_red.png")?>" data-placement="top" data-trigger="hover" animation="true">
                            
                        </div>
                        
                        <!-- EXTRA -->
                        <div class="input-extra">
                            
                            <!-- CODIGO AUTOMATICO -->
                            <div class="icon-extra">
                                <img class="input-icon icon-codigo-automatico hover_opacity" src="<?=base_url("img/generate_1.png")?>">
                            </div>
                            
                            <!-- CODIGO ALTERNATIVO -->
                            <div class="icon-extra">
                                <img  data-toggle="modal" data-target="#mdlCodigosAlternativos" class="input-icon icon-add hover_opacity" src="<?=base_url("img/add_1.png")?>">
                            </div>
                            
                            <!-- INFORMACAO -->
                            <div class="icon-extra">
                                <img  data-toggle="modal" data-target="#mdlInformacao" name="Código" classe="codigo" class="input-icon icon-info hover_opacity" icon-info_campo"" src="<?=base_url("img/info_4.png")?>">
                            </div>
                            
                        </div>
                    </div>
            	</div>
            	
            </div> 
                    
        	<! -- DESCRIÇÃO -->
            <div class="Descricao">
            
            	<label>Descrição</label>    
                <input type="text" name="Descricao" class="form-control" maxlength="250">
            
            </div>
            
            <!-- UNIDADE APRESENTAÇÃO -->
            <div class="UnidadeApresentacao">
            
            	<label>Unidade Apresentação</label>
	            <select name="UnidadeApresentacao" class="form-control"> 
	                  
	                <option value="">--</option>
	                <?php foreach($lProduto_TabelasFilhas["lUnidadeApresentacao"] as $itemUnidadeApresentacao){?>
	                    <option value="<?=$itemUnidadeApresentacao["Id"]?>"><?=$itemUnidadeApresentacao["Codigo"]?> - <?=$itemUnidadeApresentacao["Descricao"]?></option>
	                <?php } ?>
	                
	            </select>
	            
            </div>
            
            <div class="categorizacao">
            
	            <div class="Fornecedor">
	            	
	            	<label>Fornecedor</label>
		            <select name="Fornecedor" class="form-control"> 
		                  
		                <option value="">--</option> 
		                <?php foreach($lProduto_TabelasFilhas["lFornecedor"] as $itemFornecedor){?>
		                    <option value="<?=$itemFornecedor["Id"]?>"><?=$itemFornecedor["Descricao"]?></option>
		                <?php } ?>
		                
		            </select>
		            
	            </div>
	            
	            <div class="Grupo">
	            
	            	<label>Grupo</label>
		            <select name="Grupo" class="form-control"> 
		                  
		                <option value="">--</option>   
		                <?php foreach($lProduto_TabelasFilhas["lGrupo"] as $itemGrupo){?>
		                    <option value="<?=$itemGrupo["Id"]?>"><?=$itemGrupo["Descricao"]?></option>
		                <?php } ?>
		                
		            </select>
		            
	            </div>
	            
	            <div class="Tipo">
	            
	            	<label>Tipo</label>
		            <select name="Tipo" class="form-control"> 
		                
		                <option value="">--</option>   
		                <?php foreach($lProduto_TabelasFilhas["lTipo"] as $itemTipo){?>
		                    <option value="<?=$itemTipo["Id"]?>"><?=$itemTipo["Descricao"]?></option>
		                <?php } ?>
		                
		            </select>
		            
	            </div>
            
            </div>
            
            <div class="Tributacao">
	            
	            <div class="CST_CSOSN">
	            
	            	<label>CST</label>    
	            	<input type="text" name="CST_CSOSN" class="form-control" placeholder="">
	                <input type="hidden" name="CST_CSOSN_Origem_Id" value="1">
	                <input type="hidden" name="CST_CSOSN_SituacaoTributaria_Id" value="1">
	                <input type="hidden" name="Id_CST_CSOSN" class="form-control" value="1">
	            
	            </div>
	            
	            <div class="Aliquota">
	            
	            	<label>Alíquota</label>    
	                <input type="number" name="Aliquota" class="form-control" placeholder="">
	            
	            </div>
	            
	            <div class="Ncm_Sh">
	            
	            	<label>Ncm_Sh</label>    
	                <input type="text" name="Ncm_Sh" class="form-control">
	                <input type="hidden" name="Ncm_Sh_Id" value="1">
	                
	            </div>
	            
	            <div class="Cest">
	            
	            	<label>Cest</label>    
	                <input type="text" name="Cest" class="form-control" placeholder="">
	                <input type="hidden" name="Cest_Id">
	            
	            </div>
            
            </div>
            
            <div class="campos_preco">
            	
            	<div class="Preco">
	            
	            	<label>Preco Venda (<?= $PrecoPreferencial["Descricao"] ?>)</label>    
	                <input type="text" name="Preco" class="form-control">
	            	<input type="hidden" name="TipoPreco" value="<?=$PrecoPreferencial["Id"]?>">
	            
	            </div>
	            
	            <div class="Preco">
	            
	                <a href="#">Promoção</a>
	            
	            </div>
            	
            </div>
        
            <!-- MODAL CODIGOS ALTERNATIVOS -->
            <div class="modal fade" id="mdlCodigosAlternativos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Códigos Alternativos</h4>
                  </div>
                  <div class="modal-body">

                      <div class="CodigosAlternativos">
                          
                        <div class="ListaCodigos">  
            
                        <?php for($n = 1;$n <= 5;$n++){ ?>  
                          
                            <div class="codigo_alternativo">  
                                <label><?=$n?>º</label> 
                                <input type="text" name="CodigosAlternativos<?=$n?>" tabela="tb_codigosalternativos" coluna="Codigo" status="0" class="com_opcoes codigoAlternativo form-control input_validacao" maxlength="250">
                                <div class="input-options">
                        
                                    <!-- STATUS -->
                                    <div class="input-status">

                                        <!-- ICON - OBRIGATORIO -->
                                        <img class="input-icon input-naoObrigatorio icon_notfocus" src="<?=base_url("img/circulo.png")?>">

                                        <img class="input-icon input-naoObrigatorio icon_onfocus only_onFocus" src="<?=base_url("img/circulo_orange.png")?>">

                                        <!-- STATUS -->
                                        <img class="input-icon input-status-icon icon-correto" src="<?=base_url("img/correto_green.png")?>">

                                        <img class="input-icon input-status-icon icon-erro" src="<?=base_url("img/alert_red.png")?>" data-placement="right" data-trigger="hover" animation="true">

                                    </div>
                                    
                                </div>    
                            </div>
                          
                        <?php } ?> 
                        
                        </div>    
                            
                        <input type="hidden" class="numero_codigosAlternativos" name="n_codigos_alterativos" value="5">
                          
                        <div class="botoes_modal">  
                            <p class="btn btn-primary add_codigo">+1</p>
                            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>  
                        
                    </div> 

                  </div>
                </div>
              </div>
            </div>

            
            <input type="submit" value="Incluir">
            
        <?= form_close()?>
        
    </div>
    
</section>

<span class="no-view base_url"><?=base_url()?></span>

<!-- MODAL INFORMAÇÃO -->
<div class="modal fade" id="mdlInformacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Informação Campo - <span class="Campo_Informacao"></span></h4>
      </div>
      <div class="modal-body">
          
          <div class="produto_info_campos">
    
            <?php foreach($lProduto_Info as $info){?>

                <div class="info campo-<?=$info["Coluna"]?>">

                    <p><?=$info["Informacao"]?></p>

                </div>    

            <?php } ?>
    
          </div>
            
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="<?= base_url("js/adm_produtos.js")?>"></script>