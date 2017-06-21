

// Ajax post
//$(document).ready(function() {
	
	/*
	status
	
	0 = Vazio.
	1 = Erro.
	2 = Sucesso.
	*/
    
    $(function () {$('[data-toggle="tooltip"]').tooltip();})
    
    $(".input_validacao").change(function(event) {
        event.preventDefault();
        
        input = $(this);
        
        var tabela = input.attr("tabela");
        var coluna = input.attr("coluna");
        var valor = input.val();
        var name = input.attr("name");
        
        HasErro = false;
        
        if(tabela == "tb_codigosalternativos")
        {
            input_Lista = $(this);
            $(".codigoAlternativo").each(function() 
            {
                
                if($(this).val() != "")
                {
                    
                    if(name != $(this).attr("name"))
                    {
                        if(valor == $(this).val())
                        {
                            HasErro = true;
                            
                            ZerarConfiguracoesStatus(input);
                            input.closest("div").find(".icon-erro").attr("title","Alerta");
                            input.closest("div").find(".icon-erro").attr("data-content","Ja existe um código semelhante no formulário de cadastro");

                            InputErro(input);
                        }
                    }
                }
                
            })
        }

        if(HasErro == false){
            if(valor != ""){

                jQuery.ajax({
                    type: "POST",
                    url: "http://localhost/Gerensys_LojaVirtual/index.php/Ajax_Post/Valida_existencia",
                    dataType: 'json',
                    data: {tabela: tabela, coluna: coluna,valor:valor},
                    success: function(res) {
                    if (res)
                        {

                            ZerarConfiguracoesStatus(input);

                            input.attr("status",res.Status);

                            if(res.Status == 1){
                                
                                input.closest("div").find(".icon-erro").attr("title",res.Titulo);
                                input.closest("div").find(".icon-erro").attr("data-content",res.Mensagem);

                                InputErro(input);
                                
                            }
                            if(res.Status == 2){
                                
                                InputSucesso(input);
                                
                            }

                        }
                    }
                });

            }
            else{

                ZerarConfiguracoesStatus(input);

                input.closest("div").find(".icon_notfocus").show();
                input.closest("div").find(".icon_onfocus").hide();
                input.addClass("input_validacao");

                input.attr("status",0);
            }
        }


    });

    $(".com_opcoes").click(function(event) {
        
        status = $(this).attr("status");
        
        if(status == 0){
            
            $(this).closest("div").find(".input-options").addClass("input-options_validacao_pendente");
            $(this).closest("div").find(".icon_notfocus").hide();
            $(this).closest("div").find(".icon_onfocus").show();
        }
    
    });
    
    $(".com_opcoes").blur(function(event) {
    
        input = $(this);
        status = input.attr("status");
        
        if(status == 0){
            
            ZerarConfiguracoesStatus(input);
            
            input.closest("div").find(".icon_notfocus").show();
            input.closest("div").find(".icon_onfocus").hide();
            input.addClass("input_validacao");
            
        }
    
    });
    
    $(".icon-info").click(function(event) {
       
        campo = $(this).attr("name");
        clase = $(this).attr("classe");
        
        $(".campo-"+clase).show();
        $(".Campo_Informacao").text(campo);
        
    });
    
    $(".add_codigo").click(function(event) {
        
        numeroCodigos = $(".numero_codigosAlternativos").val();
        base_url = $(".base_url").text();
        
        proximoCodigo = parseInt(numeroCodigos)+1;
        
        $(".ListaCodigos").append("<div class='codigo_alternativo'><label>"+proximoCodigo+"º</label><input type='text' name='CodigosAlternativos"+proximoCodigo+"' tabela='tb_codigosalternativos' coluna='Codigo' status='0' class='com_opcoes codigoAlternativo form-control input_validacao' maxlength='250'><div class='input-options'><div class='input-status'><img class='input-icon input-naoObrigatorio icon_notfocus' src='"+base_url+"/img/circulo.png'><img class='input-icon input-naoObrigatorio icon_onfocus only_onFocus' src='"+base_url+"/img/circulo_orange.png'><img class='input-icon input-status-icon icon-correto' src='"+base_url+"/img/correto_green.png'><img class='input-icon input-status-icon icon-erro' src='"+base_url+"/img/alert_red.png' data-placement='right' data-trigger='hover' animation='true'></div></div></div>");
        
        $(".numero_codigosAlternativos").val(proximoCodigo);
    }); 
 
//});

function ZerarConfiguracoesStatus(pInput){
		
	pInput.closest("div").find(".input-options").removeClass("input-options_validacao_pendente");	
	pInput.closest("div").find(".input-options").removeClass("input-options_validacao_sucesso");
	pInput.closest("div").find(".input-options").removeClass("input-options_validacao_erro");
    pInput.removeClass("input_validacao");
    pInput.removeClass("input-sucesso");
	pInput.removeClass("input-erro");
    
	pInput.closest("div").find(".input-obrigatorio").hide();  
	pInput.closest("div").find(".icon-erro").hide(); 
	pInput.closest("div").find(".icon-correto").hide();
	pInput.closest("div").find(".icon_notfocus").hide();
	pInput.closest("div").find(".icon_onfocus").hide();
	pInput.closest("div").find(".icon-erro").popover("destroy"); 	
}

function InputErro(pInput){
    
    pInput.addClass("input-erro");
    pInput.closest("div").find(".icon-erro").show();  
    pInput.closest("div").find(".input-options").addClass("input-options_validacao_erro");  
    pInput.closest("div").find(".icon-erro").popover("show"); 
    
}

function InputSucesso(pInput){
    
    pInput.addClass("input-sucesso");    
    pInput.closest("div").find(".icon-correto").show();    
    pInput.closest("div").find(".input-options").addClass("input-options_validacao_sucesso");
    
}