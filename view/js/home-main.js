$(document).ready(function(){
    
    /* DROPDOWN TIPO QUARTO */
    $("#inputGroupTipoQuarto").on("click", function(){
        
        if( $(".dropdownTQuarto").attr("data-open") == 0 ){
            
            $(".dropdownTQuarto").css({"display":"block"});
            $(".dropdownTQuarto").attr("data-open", 1);
        }
        else{
            
            $(".dropdownTQuarto").css({"display":"none"});
            $(".dropdownTQuarto").attr("data-open", 0);
        }
    });
    
    $(".dropdownTQuarto ul li").on("click", function(){
        
        $("#InputHomeTipoQuarto").val(  $(this).attr("data-value") );
    });
    /* / DROPDOWN TIPO QUARTO */
    
    /* AUTOCOMPLETE CIDADE (JQUERY UI)  */    
    $("#InputHomeCidade" ).autocomplete({
        source: cidades
    });
    /* / AUTOCOMPLETE CIDADE (JQUERY UI)  */
    
    /* MENU RESPONSIVE */
    $(".responsiveMenuBars .btn").on("click", function(){
        
        if( $(".responsiveMenu").attr("data-view") == 0 ){
            
            $(".responsiveMenu").css({"display":"block"});
            $(".responsiveMenu").attr("data-view", 1);
        }
        else{
            
            $(".responsiveMenu").css({"display":"none"});
            $(".responsiveMenu").attr("data-view", 0);
        }
    });
    
    $(window).resize(function (){
        
        $(".responsiveMenu").css({"display":"none"});
        $(".responsiveMenu").attr("data-view", 0);
    });
    /* / MENU RESPONSIVE */
    
    /* PESQUISA AVANÇADA */
    
    /* / PESQUISA AVANÇADA */
});


