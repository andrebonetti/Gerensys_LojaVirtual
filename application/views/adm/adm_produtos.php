<section class="home my-content">
    <div class="myContainer">
        
        <h1>Produtos</h1>
        
        <?=var_dump($lProduto)?>
        
        <?=var_dump($lProduto_TabelasFilhas)?>
        
        <h2>Cadastrar Produtos</h2>
        
        <?= form_open("adm_produtos/Incluir",array("class"=>"link-update"))?>
        
        	<!-- DIA -->
	
			<div class="Codigo">
            
            	<label>Código</label>    
                <input type="text" name="Codigo" class="form-control" placeholder="" maxlength="50">
            
            </div> 
            
            <div class="CodigosAlternativos">
            
            	<label>Códigos Alternativos</label>    
                <input type="text" name="CodigosAlternativos" class="form-control" placeholder="" maxlength="250">
            
            </div> 
            
            <div class="CodigosAlternativos">
            
            	<label>Códigos Alternativos</label>    
                <input type="text" name="CodigosAlternativos" class="form-control" placeholder="" maxlength="250">
            
            </div>
            
            <div class="Descricao">
            
            	<label>Descrição</label>    
                <input type="text" name="Descrição" class="form-control" placeholder="" maxlength="250">
            
            </div>
            
            <div class="UnidadeApresentacao">
            
	            <select name="UnidadeApresentacao" class="form-control"> 
	                  
	                <option>Unidade Apresentação</option>
	                <?php foreach($lProduto_TabelasFilhas["lUnidadeApresentacao"] as $itemUnidadeApresentacao){?>
	                    <option value="<?=$itemUnidadeApresentacao["Id"]?>"><?=$itemUnidadeApresentacao["Codigo"]?> - <?=$itemUnidadeApresentacao["Descricao"]?></option>
	                <?php } ?>
	                
	            </select>
	            
            </div>
            
            <div class="Fabricante">
            
	            <select name="Fabricante" class="form-control"> 
	                  
	                <option>Fabricante</option>
	                <?php foreach($lProduto_TabelasFilhas["lFornecedor"] as $itemFornecedor){?>
	                    <option value="<?=$itemFornecedor["Id"]?>"><?=$itemFornecedor["Descricao"]?></option>
	                <?php } ?>
	                
	            </select>
	            
            </div>
            
            <div class="Grupo">
            
	            <select name="Grupo" class="form-control"> 
	                  
	                <option>Grupo</option>
	                <?php foreach($lProduto_TabelasFilhas["lGrupo"] as $itemGrupo){?>
	                    <option value="<?=$itemGrupo["Id"]?>"><?=$itemGrupo["Descricao"]?></option>
	                <?php } ?>
	                
	            </select>
	            
            </div>
            
            <div class="Tipo">
            
	            <select name="Tipo" class="form-control"> 
	                  
	                <option>Tipo</option>
	                <?php foreach($lProduto_TabelasFilhas["lTipo"] as $itemTipo){?>
	                    <option value="<?=$itemTipo["Id"]?>"><?=$itemTipo["Descricao"]?></option>
	                <?php } ?>
	                
	            </select>
	            
            </div>
            
            <div class="CST_CSOSN">
            
            	<label>CST</label>    
                <input type="number" name="CST_CSOSN" class="form-control" placeholder="">
            
            </div>
            
            <div class="Aliquota">
            
            	<label>Alíquota</label>    
                <input type="number" name="Aliquota" class="form-control" placeholder="">
            
            </div>
            
        <?= form_close()?>
        
    </div>
</section>