$(document).ready(function (){
    
    function executarAcao( btn ){
        
        $.post(
            "/Roomie/ajax/iobj/MinhasVagas",
            
            {
                id:     $(btn).parent().attr("data-idvaga"),
                acao:   $(btn).attr("data-acao"),
                status: $(btn).attr("data-dispo")
            },
            
            function (data){
                
                alert(data);
                
                if( data == 1 && $(btn).attr("data-acao") == "apagar"){
                   
                    $( "#vaga" + $(btn).parent().attr("data-idvaga") ).css({"display":"none"});
                }
                
                else if( data == 1 && $(btn).attr("data-acao") == "alterarDisponibilidade"){
                    
                    if( $(btn).attr("data-dispo") == 1 ){
                        
                        $("#disponibilidade" + $(btn).parent().attr("data-idvaga") ).html("<i class='fa fa-flag-o'></i> Ativar");
                        $(btn).attr("data-dispo", 0);
                    }
                    else{
                        
                        $("#disponibilidade" + $(btn).parent().attr("data-idvaga") ).html("<i class='fa fa-exclamation-circle'></i> Desativar");
                        $(btn).attr("data-dispo", 1);
                    }
                }
            }
        );
    }
    
    $(".btnAcoes button").on("click", function(e){
        
        var btn = $(this);
        
        e.preventDefault();
        
        executarAcao( btn );
    });
});