$(document).on("mouseenter", ".header-setor-item", function(){
    
    $(".header-grupo").hide();
    $(this).find(".header-grupo").css("display","table");
    
});

$(document).on("mouseenter", ".header-grupo-item", function(){
        
    $(".header-subgrupo").hide();
    $(this).find(".header-subgrupo").css("display","table");
    
});

$(document).on("mouseleave", ".header-grupo", function(){       
    $(this).hide();   
});

$(document).on("mouseleave", ".header-subgrupo", function(){      
    $(this).hide(); 
});

$(function () {$('[data-toggle="tooltip"]').tooltip();})