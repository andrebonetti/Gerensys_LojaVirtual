// Valida Variantes
hasVariante =  $(".has-variante").text();
if(hasVariante == 1){  
    $(".compra-rapida").prop("disabled", true);
    $(".adicionar-carrinho").prop("disabled", true);
    
    $(".alerta-variantes").show();
}

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
        $(".variante-Cor").each(function() 
        {
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

