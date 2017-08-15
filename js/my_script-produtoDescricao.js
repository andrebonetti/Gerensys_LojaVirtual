// Valida Variantes
hasVariante =  $(".has-variante").text();
if(hasVariante == 1){  
    $(".compra-rapida").prop("disabled", true);
    $(".adicionar-carrinho").prop("disabled", true);
    
    $(".alerta-variantes").show();
}

//Ajustes Slide Jassor
$(".slide-noActive").css("visibility","hidden");

$(document).on("click", ".variante-naoAtiva", function(){

    tipo = $(this).attr("data-name");
    id = $(this).attr("data-value");
    descricao = $(this).attr("data-content");
    
    $("."+tipo+"-input").val(id);
    $("."+tipo+"-td").text(descricao);
    
    $(this).closest(".listaVariantes").find(".variante-option").removeClass("activeVariante");
    $(this).closest(".listaVariantes").find(".variante-option").addClass("variante-naoAtiva");
    $(this).addClass("activeVariante");
    $(this).removeClass("variante-naoAtiva");
    
    validar_compra();
    
    if(tipo == "tamanho")
    {
        statusCor = $(".variante-cor-ativo").text();
 
        if(statusCor == "0"){
                
            $(".variante-Cor").each(function(){
                
                $(this).find(".variante-option").removeClass("js-esgotado");
                $(this).find(".variante-option").removeClass("js-alerta");
                $(this).find(".variante-option").addClass("variante-naoAtiva");
                
                msgPadrao = $(this).find(".msgPadrao").text();
                $(this).find(".variante-option").attr("data-original-title",msgPadrao);
                
                EstoqueCorRelacionada = $(this).find(".EstoqueIdTamanho"+id).text();
                qtdeAlerta            = parseInt($(this).find(".QtdeAlerta").text());
                
                if(EstoqueCorRelacionada == ""){
                    $(this).find(".variante-option").addClass("js-esgotado");
                    $(this).find(".variante-option").removeClass("variante-naoAtiva");
                    
                    nomeCor = $(this).find(".nomeCor").text();
                    
                    $(this).find(".variante-option").attr("data-original-title",nomeCor + " - Esgotado");
                }
                else{
                    if(qtdeAlerta >= parseInt(EstoqueCorRelacionada)){
                        //alert("alerta " + EstoqueCorRelacionada);
                        
                        $(this).find(".variante-option").addClass("js-alerta");
                        
                        nomeCor = $(this).find(".nomeCor").text();
                    
                        $(this).find(".variante-option").attr("data-original-title",nomeCor + " - Restam apenas " + EstoqueCorRelacionada + " produtos no estoque");
                    
                    }
                }
                
                
            });
        
        }
        
        $(".variante-tamanho-ativo").text("1");
    }
    
    if(tipo == "cor")
    {
        statusTamanho = $(".variante-tamanho-ativo").text();
 
        if(statusTamanho == "0"){
        
            $(".variante-Tamanho").each(function() 
            {
                $(this).find(".variante-option").removeClass("js-esgotado");
                $(this).find(".variante-option").removeClass("js-alerta");
                $(this).find(".variante-option").addClass("variante-naoAtiva");
                
                msgPadrao = $(this).find(".msgPadrao").text();
                $(this).find(".variante-option").attr("data-original-title",msgPadrao);
                
                togglePadrao = $(this).find(".togglePadrao").text();
                if(togglePadrao == "tooltip"){
                    $(this).find(".variante-option").tooltip();
                }
                else{
                    $(this).find(".variante-option").tooltip('destroy');
                }
                
                EstoqueTamanhoRelacionada = $(this).find(".EstoqueIdCor"+id).text();
                qtdeAlerta                = parseInt($(this).find(".QtdeAlerta").text());
                
                if(EstoqueTamanhoRelacionada == ""){
                    $(this).find(".variante-option").addClass("js-esgotado");
                    $(this).find(".variante-option").removeClass("variante-naoAtiva");
                    
                    $(this).find(".variante-option").attr("data-original-title","Produto Esgotado");
                    
                    $(this).find(".variante-option").tooltip();
                }
                else{
                    if(qtdeAlerta >= parseInt(EstoqueTamanhoRelacionada)){
                        
                        $(this).find(".variante-option").addClass("js-alerta");
                        
                        $(this).find(".variante-option").attr("data-original-title","Restam apenas " + EstoqueTamanhoRelacionada + " produtos no estoque");
                        $(this).find(".variante-option").tooltip();
                    }
                }

            });
        
        }
        
        $(".variante-cor-ativo").text("1");
        
        //Alterar Imagem
        $(".slide-active").hide();
        $(".slideCor-"+id).show();
        $(".slideCor-"+id).css("visibility","visible");
        $(".slideCor-"+id).addClass("slide-active");
        $(".slideCor-"+id).removeClass("slide-noActive");
    }
    
});

$(document).on("click", "p.activeVariante", function(){
    
    $(this).removeClass("activeVariante");
    $(this).addClass("variante-naoAtiva");
    
    tipo = $(this).attr("data-name");
    
    $("."+tipo+"-input").val("");
    $("."+tipo+"-td").text("");
    
    if(tipo == "tamanho"){
        
        $(".variante-Cor").each(function() 
        {
            $(this).find(".variante-option").removeClass("js-esgotado");
            $(this).find(".variante-option").removeClass("js-alerta");
            $(this).find(".variante-option").addClass("variante-naoAtiva");
            
            msgPadrao = $(this).find(".msgPadrao").text();
            $(this).find(".variante-option").attr("data-original-title",msgPadrao);
        });
        
        $(".variante-tamanho-ativo").text("0");
    }
    
    if(tipo == "cor"){
        
        $(".variante-Tamanho").each(function() 
        {
            $(this).find(".variante-option").removeClass("js-esgotado");
            $(this).find(".variante-option").removeClass("js-alerta");
            $(this).find(".variante-option").addClass("variante-naoAtiva");
            
            togglePadrao = $(this).find(".togglePadrao").text();

            if(togglePadrao == "tooltip"){
                $(this).find(".variante-option").tooltip();
            }
            else{
                $(this).find(".variante-option").tooltip('destroy');
            }
        });
        
        $(".variante-cor-ativo").text("0");
        
    }
    
    desativar_compra();
    
});

function validar_compra(){
    
    $validacao = true;
    
    //Tamanho
    hasVariante_tamanho =  $(".has-variante-tamanho").text();
    
    if(hasVariante_tamanho == 1){
        
        valorTamanho = $(".tamanho-input").val();
        
        if(valorTamanho == ""){
            $validacao = false;
        }
        
    }
    
    //Cor
    hasVariante_cor =  $(".has-variante-cor").text();
    
    if(hasVariante_cor == 1){
        
        valorCor = $(".cor-input").val();
        
        if(valorCor == ""){
            $validacao = false;
        }

    }
    
    if($validacao == true){
        ativar_compra();
    }
}

function ativar_compra(){
    
    $(".compra-rapida").prop("disabled", false);
    $(".adicionar-carrinho").prop("disabled", false);
    
    $(".alerta-variantes").hide();
    
}

function desativar_compra(){
    
    $(".compra-rapida").prop("disabled", true);
    $(".adicionar-carrinho").prop("disabled", true);
    
    $(".alerta-variantes").show();
    
}