(function(){
    'use strict';
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

    function teste(){
        console.log('teste');
    }

    function alertModal(msg,title){
        var $modal = document.querySelector('[data-js="modal"]')
        var $actionConfirm = document.querySelector('[data-js="btnConfirm"]')
        $actionConfirm.style.display = 'none'
        exibirModal($modal,msg,title)
    }
    
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

    function gerarExcel($check,csrf){
        var $input = document.querySelector('[data-js="inputIds"]')
        var $form = document.querySelector('[data-js="formIDs"]')

        var $arrayCheck = Array.prototype.filter.call($check,function(inputcheck){
                            return inputcheck.checked === true
                        })
        
        var arrayCheckValues = Array.prototype.map.call($arrayCheck,function(inputcheck){
                                return inputcheck.value
                            })

        $input.value = arrayCheckValues
        $form.submit()
        
    }

    function gerarDocumento(btn){
        var $btn = document.querySelector(btn);
        if($btn){
            $btn.addEventListener('click',function(e){
                e.preventDefault()
                var $check = document.querySelectorAll('[data-js="select"]')
                if(!verifyChecked($check))
                    return alertModal('Nenhum registro foi selecionado.','Erro ao gerar documento')
                else
                    $btn.value === 'Pdf' ? gerarPDF()  : gerarExcel($check,$btn.value)
            })
        }
    } 

    function somenteNumeros(input) {
        var $input = document.querySelector(input)
        if($input){
            $input.addEventListener('keypress',(e) => {
                var charCode = e.charCode ? e.charCode : e.keyCode;
                if (charCode != 8 && charCode != 9) {
                    if (charCode < 48 || charCode > 57) {
                        e.preventDefault();
                    }
                }
            })
        }
    }

    function pesquisarEstado(){
        var $estado = document.querySelector('[data-js="estado"]');
        if($estado){
            $estado.addEventListener('change', function(){
                var id = $estado.value
                var url = `../estado/${id}`
                GetRequest(url)
            })
        }   
    }

    function setMaskEstado(estado){
        var $IncricaoEstadual = document.querySelector('[data-js="ie"]')
        if($IncricaoEstadual){
            $($IncricaoEstadual).mask(estado.mask)   
          }
    }

    function GetRequest(url){
        var xhr = new XMLHttpRequest()
        xhr.open('GET',url)
        xhr.send()
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4){
                setMaskEstado(JSON.parse(xhr.responseText))
            }
        }
    }

    // function sendRequest(csrf,valores){
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("GET", 'download',true);
    //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //     xhr.setRequestHeader('X-CSRF-TOKEN',csrf)
    //     xhr.onreadystatechange = function() { 
    //         if (xhr.readyState === 4) {
    //           document.write(xhr.responseText)
    //         }
    //     }
    //     xhr.send('valores='+JSON.stringify(valores));
    // }

    //InscricaoEstadual()
    confirmModal('[data-js="delete"]','Deseja remover este registro?','Removendo registro')
    confirmModal('[data-js="active"]','Deseja ativar este registro?','Ativando registro')
    confirmModal('[data-js="disable"]','Deseja desativar este registro?','Desativando registro!')
    PesquisaSubmit()
    selectAll()
    gerarDocumento('[data-js="Pdf"]')
    gerarDocumento('[data-js="Excel"]')
    somenteNumeros('[data-js="password"]')
    somenteNumeros('[data-js="ano"]')
    somenteNumeros('[data-js="modelo"]')
    somenteNumeros('[data-js="ie"]')
    pesquisarEstado()


}())
