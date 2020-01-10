(function(){
    'use strict';
    
    var $cpf = document.querySelector('[data-js="cpf"]')

    $cpf.addEventListener('input',function(e){
        $cpf.value = formatarCPF($cpf.value)
    })

    function formatarCPF(cpf){
        var newCPF
        newCPF = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,"$1.$2.$3-$4")   
        return newCPF
    }


        

}())