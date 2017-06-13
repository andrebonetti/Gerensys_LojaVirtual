<section class="home my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <h2>Cadastrar Produtos</h2>
        
        <?= form_open("adm_produtos/Incluir",array("class"=>"link-update"))?>
        
        	<!-- DIA -->
	
			<div class="Codigo">
            
            	<div class="CodigoPrincipal">
            		<label>Código</label>    
                	<input type="text" id="codigo" name="Codigo" class="form-control input_validacao" maxlength="50">
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
                    
            <div class="Descricao">
            
            	<label>Descrição</label>    
                <input type="text" name="Descricao" class="form-control" placeholder="" maxlength="250">
            
            </div>
            
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
	                <input type="hidden" name="CST_CSOSN_Origem_Id" class="form-control" value="1">
	                <input type="hidden" name="CST_CSOSN_SituacaoTributaria_Id" class="form-control" value="1">
	            
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
            
            <input type="submit" value="Incluir">
            
        <?= form_close()?>
        
    </div>
    
</section>

<script type="text/javascript">

	// Ajax post
	$(document).ready(function() {
		$("#codigo").blur(function(event) {
			event.preventDefault();
			
			var tabela = "tb_produto";
			var coluna = $(this).attr("name");
			var valor = $("input#codigo").val();
			
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/Ajax_Post/Valida_existencia",
				dataType: 'json',
				data: {tabela: tabela, coluna: coluna,valor:valor},
				success: function(res) {
				if (res)
					{
						if(res.Resultado == 0){
							alert(res.Mensagem);
						}
						else{
							alert("uhuul");
						}
						// Show Entered Value
						/*jQuery("div#result").show();
						jQuery("div#value").html(res.username);
						jQuery("div#value_pwd").html(res.pwd);*/
						//alert("foi");
					}
				}
			});
		});
	});
	
</script>
<script type="text/javascript" src="<?= base_url("js/adm_produtos.js")?>"></script>