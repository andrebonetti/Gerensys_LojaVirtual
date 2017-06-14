<section class="home my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <h2>Cadastrar Produtos</h2>
        
        <?= form_open("adm_produtos/Incluir",array("class"=>"link-update"))?>
        
        	<!-- CODIGO -->	
			<div class="Codigo">
                
            	<div class="CodigoPrincipal">
            		<label>Código</label>    
                	<input type="text" id="codigo" name="Codigo" status="0" class="form-control com_opcoes input_validacao" maxlength="50">
                    <div class="input-options">
                        <div class="input-status">
                            
                            <img class="input-icon input-obrigatorio icon-correto icon_notfocus" src="<?=base_url("img/asterisk_red.png")?>" data-toggle="tooltip" data-html="true" title="<span class='input-info'>Campo Obrigatorio</span>">
                            
                            <img class="input-icon input-obrigatorio icon-correto icon_onfocus" src="<?=base_url("img/asterisk_orange.png")?>" data-toggle="tooltip" data-html="true" title="<span class='input-info'>Campo Obrigatorio</span>">
                            
                            <img class="input-icon input-status-icon icon-correto" src="<?=base_url("img/correto_green.png")?>">
                            
                            <img class="input-icon input-status-icon icon-alert" src="<?=base_url("img/alert.png")?>">
                            
                        </div>
                        <div class="input-extra">
                            <img class="input-icon icon-codigo-automatico" src="<?=base_url("img/generate.png")?>">
                        </div>
                    </div>
            	</div>
            	
            	<div class="CodigosAlternativos">
            
	            	<label>Códigos Alternativos</label>    
	                <input type="text" name="CodigosAlternativos1" class="form-control" placeholder="" maxlength="250">
	            	<input type="text" name="CodigosAlternativos2" class="form-control" placeholder="" maxlength="250">
	            	<input type="text" name="CodigosAlternativos3" class="form-control" placeholder="" maxlength="250">
	            	<input type="text" name="CodigosAlternativos4" class="form-control" placeholder="" maxlength="250">
	            	<input type="text" name="CodigosAlternativos5" class="form-control" placeholder="" maxlength="250">
	            	
	            	<input type="hidden" name="n_codigos_alterativos" value="5">
	            	
            	</div> 
            	
            	<div class="CodigoAutomatico">
            		<a href="#">Gerar código automáticamente</a>
            	</div>
            	
            </div> 
                    
        	<! -- DESCRIÇÃO -->
            <div class="Descricao">
            
            	<label>Descrição</label>    
                <input type="text" name="Descricao" class="form-control input-sucesso" maxlength="250">
            
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
	                <input type="text" name="Preco" class="form-control input-erro">
	            	<input type="hidden" name="TipoPreco" value="<?=$PrecoPreferencial["Id"]?>">
	            
	            </div>
	            
	            <div class="Preco">
	            
	                <a href="#">Promoção</a>
	            
	            </div>
            	
            </div>
            
            <input type="submit" value="Incluir">
            
        <?= form_close()?>
        
    </div>
    
</section>

<a href="" data-toggle="modal" data-target="#mdlContato">Contato</a>

<!-- Modal Contato -->
<div class="modal fade" id="mdlContato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contato</h4>
      </div>
      <div class="modal-body">
          
        <p class="grande-saopaulo alert alert-warning"><strong>Atendemos somente na Grande São Paulo.</strong></p>

        <p><strong>No momento, não formamos parcerias com revendas.</strong></p>
             
        <h2>Telefone</h2>
          
        <p>(11) 2621-9761</p>  
          
        <h2>Horário de Atendimento da Gerensys</h2>  
          
        <p>De segunda a quinta-feira, das 08h30min ás 17:30min.</p>  
        <p>Ás sextas-feiras, das 10 as 17 horas.</p>  
          
        <h2>E-mail</h2>

          <?= form_open('contato/email_send')?>
          
                <select class="form-control" name="assunto" autofocus>
                    <option>Selecione o Assunto</option>
                    <option value="Orçamento">Orçamento</option>
                    <option value="Currículo">Curriculo</option>
                    <option value="Dúvidas">Duvidas</option>
                    <option value="Reclamações">Reclamações</option>
                    <option value="Outros">Outros</option>
                </select>
          
		        <input type="text" name="nome" class="form-control nome" placeholder="Nome Completo" required>
		        
		        <input type="text" name="empresa" class="form-control empresa" placeholder="Empresa" required>
		        
                <input type="text" name="segmento" class="form-control segmento" placeholder="Segmento" required>
		        
                <input type="email" name="email" class="form-control email" placeholder="Seu E-mail " required>
		        
                <input type="text" name="telefone" class="form-control telefone" placeholder="Telefone com DDD" required maxlength="11">
		        
                <select name="estado" class="form-control estado" required>
                    <option value="">Selecione o Estado</option> 
                    <option value="AC">Acre</option> 
                    <option value="AL">Alagoas</option> 
                    <option value="AM">Amazonas</option> 
                    <option value="AP">Amapá</option> 
                    <option value="BA">Bahia</option> 
                    <option value="CE">Ceará</option> 
                    <option value="DF">Distrito Federal</option> 
                    <option value="ES">Espírito Santo</option> 
                    <option value="GO">Goiás</option> 
                    <option value="MA">Maranhão</option> 
                    <option value="MT">Mato Grosso</option> 
                    <option value="MS">Mato Grosso do Sul</option> 
                    <option value="MG">Minas Gerais</option> 
                    <option value="PA">Pará</option> 
                    <option value="PB">Paraíba</option> 
                    <option value="PR">Paraná</option> 
                    <option value="PE">Pernambuco</option> 
                    <option value="PI">Piauí</option> 
                    <option value="RJ">Rio de Janeiro</option> 
                    <option value="RN">Rio Grande do Norte</option> 
                    <option value="RO">Rondônia</option> 
                    <option value="RS">Rio Grande do Sul</option> 
                    <option value="RR">Roraima</option> 
                    <option value="SC">Santa Catarina</option> 
                    <option value="SE">Sergipe</option> 
                    <option value="SP">São Paulo</option> 
                    <option value="TO">Tocantins</option> 
                </select>
          
                <input type="text" name="cidade" class="form-control cidade" placeholder="Cidade">
          
                <input type="text" name="bairro" class="form-control bairro" placeholder="Bairro" required>
		        
                <textarea  name="mensagem" class="form-control" placeholder="Mensagem" required rows="4"></textarea><br>
                           
		        <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Limpar</button>
		  <?= form_close()?> 
          
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="<?= base_url("js/adm_produtos.js")?>"></script>