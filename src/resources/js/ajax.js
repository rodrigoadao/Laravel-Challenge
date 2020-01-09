(function(){
    'use strict';

    var get = new XMLHttpRequest()
    get.open('GET','')
    get.send()
    get.onreadystatechange = function(){
        if(get.readyState === 4){
            console.log(get.responseText)
        }
    }
    
}())