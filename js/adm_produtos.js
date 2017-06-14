

// Ajax post
$(document).ready(function() {
    
    $(function () {$('[data-toggle="tooltip"]').tooltip();})
    
    $("#codigo").change(function(event) {
        event.preventDefault();

        var tabela = "tb_produto";
        var coluna = $(this).attr("name");
        var valor = $("input#codigo").val();

        input = $(this);

        if(valor != ""){

            input.removeClass("input_validacao");

            jQuery.ajax({
                type: "POST",
                url: "http://localhost/Gerensys_LojaVirtual/index.php/Ajax_Post/Valida_existencia",
                dataType: 'json',
                data: {tabela: tabela, coluna: coluna,valor:valor},
                success: function(res) {
                if (res)
                    {
                        if(res.Resultado == 0){
                            input.removeClass("input-sucesso");
                            input.addClass("input-erro");
                            
                            
                            
                        }
                        else{
                            input.removeClass("input-erro");
                            input.addClass("input-sucesso");    
                            
                            input.closest("div").find(".input-options").addClass("input-options_validado");
                            input.closest("div").find(".icon-correto").show();    
                            input.closest("div").find(".input-obrigatorio").hide();
                         
                            input.attr("status",2);
                        }
                        // Show Entered Value
                        /*jQuery("div#result").show();
                        jQuery("div#value").html(res.username);
                        jQuery("div#value_pwd").html(res.pwd);*/
                        //alert("foi");
                    }
                }
            });

        }
        else{
            input.removeClass("input-sucesso");
            input.removeClass("input-erro");
            input.addClass("input_validacao");
            
            input.attr("status",0);
        }


    });

    $(".com_opcoes").click(function(event) {
    
        status = $(this).attr("status");
        
        if(status == 0){
            
            $(this).closest("div").find(".input-options").addClass("input-options_validacao");
            $(this).closest("div").find(".icon_notfocus").hide();
            $(this).closest("div").find(".icon_onfocus").show();
        }
    
    });
    
    $(".com_opcoes").blur(function(event) {
        
        status = $(this).attr("status");
        
        $(this).closest("div").find(".input-options").removeClass("input-options_validacao");
        
        if(status == 0 ){
            
            $(this).closest("div").find(".icon_notfocus").show();
            $(this).closest("div").find(".icon_onfocus").hide();
            $(this).closest("div").find(".input-obrigatorio").hide();
            
        }
        
        /*if(status == 2 ){
            
            input.closest("div").find(".input-obrigatorio").hide();
            
        }*/
        
    })
    
});

