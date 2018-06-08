$(document).ready(function(){
    
    $("#logoffUsuario").on("click", function (e){
        
        e.preventDefault();
        
        $.post(
            "/Roomie/ajax/iobj/loginusuario",
            
            function( retorno ){
 
                if(retorno == 1){
                    
                    location.reload();
                }
                else{

                    
                    $("body").html( retorno );
                                        
                    alert(  );
                }
            }
        );
    });
});
