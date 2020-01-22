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

    // function Data($data){
    //     var $data = document.querySelector('[data-js="dtNasc"]')
    //     if($data){
    //         $data.addEventListener('input',function(e){
    //             $data.value = formatarData($data.value)
    //         })
    //         function formatarData(data){
    //             var newDATA
    //             newDATA = data.replace(/(\d{2})(\d{2})(\d{4})/,"$1/$2/$3")
    //             return newDATA
    //         }
    //     }
    // }

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

    function exibirModal($modal,msg,title){
        var $bodyModal = document.querySelector('[data-js="modal-body"]')
        var $titleModal = document.querySelector('[data-js="modal-title"]')
        $bodyModal.innerHTML = msg
        $titleModal.innerHTML = title
        $modal.classList.add('show')
        $modal.style.display = 'block'
        fecharModal($modal)
    }

    function confirmAction(element){
        var $actionConfirm = document.querySelector('[data-js="btnConfirm"]')
        var $form = document.querySelector('[data-js="formActions"]')
        if($actionConfirm){
            $actionConfirm.style.display = 'block'
            $actionConfirm.addEventListener('click',function(e){
                $form.action = element.href
                $form.submit()
            })
        }
    }

    function fecharModal(modal){
        var $btnFechar = document.querySelector('[data-js="btnFechar"]')
        $btnFechar.addEventListener('click',function(e){
            modal.classList.remove('show');
            modal.style.display = 'none'
        })
    }

    function confirmModal(datajs,msg,title){
        var $action = document.querySelectorAll(datajs)
        var $modal = document.querySelector('[data-js="modal"]')
        if($action){
            Array.prototype.forEach.call($action,function(element){
                element.addEventListener('click',function(e){
                    e.preventDefault()
                    exibirModal($modal,msg,title)
                    confirmAction(element);
                })
            })
        }
    }

    function alertModal(msg,title){
        var $modal = document.querySelector('[data-js="modal"]')
        var $actionConfirm = document.querySelector('[data-js="btnConfirm"]')
        $actionConfirm.style.display = 'none'
        exibirModal($modal,msg,title)
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

    // function formatarSalario(){
    //     var $salario = document.querySelector('[data-js="salario"]')
    //     var $hidden = document.querySelector('[data-js="hiddensalario"]')
    //     if($salario){
    //         $salario.addEventListener('change',function(e){
    //             console.log()
    //             var regex = new RegExp(/\D+/g)
    //             $hidden.value = e.target.value.replace(regex,'')
    //             $salario.value = arraySalario($hidden.value)
    //         })
    //     }
    // }

    // function arraySalario(valores){
    //     return (( new Number(valores)).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}))
    // }

    function PesquisaSubmit(){
        var $button = document.querySelector('[data-js="imgSubmit"]')
        var $form = document.querySelector('[data-js="formPesq"]')
        if($button){
            $button.addEventListener('click',function(e){
                $form.submit()
            })
        }
    }

    function toggleCheckIndividual(param){
        var $tr = param.closest('tr')
        if(param.checked === true){
            $tr.classList.add('checked')
            $tr.classList.remove('unchecked')
        }else{
            $tr.classList.remove('checked')
            $tr.classList.add('unchecked')
        }      
    }

    function activeAll(param){
        Array.prototype.forEach.call(param,function(element,index,array){
            var $tr = element.closest('tr')
            element.checked = true;
            $tr.classList.add('checked')
            $tr.classList.remove('unchecked')
        })
    }

    function desativeAll(param){
        Array.prototype.forEach.call(param,function(element,index,array){
            var $tr = element.closest('tr')
            element.checked = false;
            $tr.classList.remove('checked')
            $tr.classList.add('unchecked')
        })
    }

    function selectAll(){
        var $checkAll = document.querySelector('[data-js="selectAll"]')
        var $check = document.querySelectorAll('[data-js="select"]')
        if($checkAll){
            $checkAll.addEventListener('change', function(e){
                if($checkAll.checked === true){
                    activeAll($check)
                }else{
                    desativeAll($check)
                }
            })
        }
        Array.prototype.forEach.call($check,function(element,index,array){
            element.addEventListener('click',function(e){
                toggleCheckIndividual(element)
                var resultado = Array.prototype.some.call($check,function(element,index,array){
                    return element.checked
                })
                if(!resultado)
                    $checkAll.checked = false
            })
        })
    }

    

    function verifyChecked(param){
        return Array.prototype.some.call(param,function(element,index,array){
            return element.checked
        })
    }

    function gerarPDF(){
        window.print()
    }

    function gerarDocumento(btn){
        var $btn = document.querySelector(btn);
        if($btn){
            $btn.addEventListener('click',function(e){
                var $check = document.querySelectorAll('[data-js="select"]')
                if(!verifyChecked($check))
                    return alertModal('Nenhum registro foi selecionado.','Erro ao gerar documento')
                $btn.value === 'Pdf' ? gerarPDF()  : alert('vai ser implementado')
            })
        }
    } 



    CPF()
    //Data()
    CNPJ()
    InscricaoEstadual()
    confirmModal('[data-js="delete"]','Deseja remover este registro?','Removendo registro')
    confirmModal('[data-js="active"]','Deseja ativar este registro?','Ativando registro')
    confirmModal('[data-js="disable"]','Deseja desativar este registro?','Desativando registro!')
    apenasNumeros('[data-js="cpf"]')
    apenasNumeros('[data-js="dtNasc"]')
    apenasNumeros('[data-js="hiddensalario"')
    apenasNumeros('[data-js="salario"]')
    apenasNumeros('[data-js="cnpj"]')
    apenasNumeros('[data-js="ie"]')
    formatarSalario()
    PesquisaSubmit()
    selectAll()
    gerarDocumento('[data-js="Pdf"]')
    gerarDocumento('[data-js="Excel"]')

    
    
}())



// function confirm(datajs,msg){
//     var $btw = document.querySelectorAll(datajs);
//     if($btw){
//         Array.prototype.forEach.call($btw,function(element){
//             console.log(element)
//             element.addEventListener('click',function(e){
//                 e.preventDefault()
//                 if(showMessage(msg)){
//                     window.location.href = element.href
//                  }
//             })
//         })
//     }
// }
// function showMessage(msg){
//     return window.confirm(msg)
// }