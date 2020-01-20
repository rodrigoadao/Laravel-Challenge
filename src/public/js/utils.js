(function(){
    'use strict';
    function CPF(){
        var $cpf = document.querySelector('[data-js="cpf"]')
        if($cpf){
            $cpf.addEventListener('input',function(e){
                $cpf.value = formatarCPF($cpf.value)
            })
            function formatarCPF(cpf){
                var newCPF
                newCPF = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,"$1.$2.$3-$4")   
                return newCPF
           }
        }
    }

    function Data($data){
        var $data = document.querySelector('[data-js="dtNasc"]')
        if($data){
            $data.addEventListener('input',function(e){
                $data.value = formatarData($data.value)
            })
            function formatarData(data){
                var newDATA
                newDATA = data.replace(/(\d{2})(\d{2})(\d{4})/,"$1/$2/$3")
                return newDATA
            }
        }
    }

    function CNPJ($CNPJ){
        var $CNPJ = document.querySelector('[data-js="cnpj"]')
        if($CNPJ){
            $CNPJ.addEventListener('input',function(e){
                $CNPJ.value = formatarCNPJ($CNPJ.value)
            })
            function formatarCNPJ(cnpj){
                var newCNPJ
                newCNPJ = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,"$1.$2.$3/$4-$5")
                return newCNPJ
            }
        }
    }

    function InscricaoEstadual($IE){
        var $IE = document.querySelector('[data-js="ie"]')
        if($IE){
            $IE.addEventListener('input',function(e){
                $IE.value = formatarCNPJ($IE.value)
            })
            function formatarCNPJ(ie){
                var newIE
                newIE = ie.replace(/(\d{8})(\d{2})/,"$1-$2")
                return newIE
            }
        }
    }

    function confirm(datajs,msg){
        var $btw = document.querySelectorAll(datajs);
        if($btw){
            Array.prototype.forEach.call($btw,function(element){
                console.log(element)
                element.addEventListener('click',function(e){
                    e.preventDefault()
                    if(showMessage(msg)){
                        console.log('testeShow')
                        window.location.href = element.href
                     }
                })
            })
        }
    }
    function showMessage(msg){
        return window.confirm(msg)
    }

    function apenasNumeros(datajs,){
        var $input = document.querySelector(datajs)
        var regex = new RegExp(/^[0-9.]+/)
        if($input){
            $input.addEventListener('input',function(e){
                if(!regex.test(e.data)){
                    var index = $input.value.length -1
                    $input.value = $input.value.replace($input.value.charAt(index),'')
                }
                    
            })
        }
    }

    function formatarSalario(){
        var $salario = document.querySelector('[data-js="salario"]')
        var $hidden = document.querySelector('[data-js="hiddensalario"]')
        if($salario){
            $salario.addEventListener('input',function(e){
                var regex = new RegExp(/\D+/g)
                $hidden.value += e.data.replace(regex,'')
                console.log($hidden.value)
                $salario.value = arraySalario($hidden.value)
            })
        }
    }

    function arraySalario(valores){
        return (( new Number(valores)).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}))
    }

    function PesquisaSubmit(){
        var $button = document.querySelector('[data-js="imgSubmit"]')
        var $form = document.querySelector('[data-js="formPesq"]')
        console.log($button)
        if($button){
            $button.addEventListener('click',function(e){
                $form.submit()
            })
        }
    }

    function selectAll(){
        var $checkAll = document.querySelector('[data-js="selectAll"]')
        var $check = document.querySelectorAll('[data-js="select"]')
        $checkAll.addEventListener('click', function(e){
            tableChecked($check)
        })
    }

    function tableChecked(param){
        Array.prototype.forEach.call(param,function(element,index,array){
            element.toggleAttribute('checked')
            var $tr = element.closest('tr')
            $tr.toggleAttribute('checked')
        })
    }



    CPF()
    Data()
    CNPJ()
    InscricaoEstadual()
    confirm('[data-js="delete"]','Deseja remover este registro?')
    confirm('[data-js="active"]','Deseja ativar este registro?')
    confirm('[data-js="disable"]','Deseja desativar este registro?')
    apenasNumeros('[data-js="cpf"]')
    apenasNumeros('[data-js="dtNasc"]')
    apenasNumeros('[data-js="hiddensalario"')
    apenasNumeros('[data-js="salario"]')
    apenasNumeros('[data-js="cnpj"]')
    apenasNumeros('[data-js="ie"]')
    formatarSalario()
    PesquisaSubmit()
    selectAll()
    
}())

