
var countLocais = window.location.href.includes('edit') ? document.getElementById("wrapperLocais").childElementCount+1 : 2; 
var countSignificados = window.location.href.includes('edit') ? document.getElementById("wrapperSignificados").childElementCount+1  : 2; 
var wrapperLocais = document.getElementById('wrapperLocais');
var wrapperSignificados = document.getElementById('wrapperSignificados');

function addLocal(){
    let inputNewLocal = document.createElement('input');
    inputNewLocal.setAttribute('id', 'local'+countLocais);
    inputNewLocal.setAttribute('class', 'shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline');
    inputNewLocal.setAttribute('name', 'local'+countLocais);
    inputNewLocal.setAttribute('type', 'text');
    wrapperLocais.appendChild(inputNewLocal);
    console.log(countLocais);
    countLocais++;
}

function addSignificado(){
    let inputNewSignificado = document.createElement('input');
    inputNewSignificado.setAttribute('id', 'significado'+countSignificados);
    inputNewSignificado.setAttribute('class', 'shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline');
    inputNewSignificado.setAttribute('name', 'significado'+countSignificados);
    inputNewSignificado.setAttribute('type', 'text');
    wrapperSignificados.appendChild(inputNewSignificado);
    console.log(countLocais);
    countSignificados++;
}

function removeLocal(){
    if(countLocais > 2){
        let lastInputLocal = document.querySelector(`#local${countLocais-1}`);
        wrapperLocais.removeChild(lastInputLocal);
        countLocais--;
    }
}

function removeSignificado(){
    if(countSignificados > 2){
        let lastInputSignificado = document.querySelector(`#significado${countSignificados-1}`); 
        wrapperSignificados.removeChild(lastInputSignificado);
        countSignificados--;
    }
}