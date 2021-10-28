
var countLocais = window.location.href.includes('edit') ? document.getElementById("wrapperLocais").childElementCount+1 : 2; 
var countSignificados = window.location.href.includes('edit') ? document.getElementById("wrapperSignificados").childElementCount+1  : 2; 
var wrapperLocais = document.getElementById('wrapperLocais');
var inputNewLocal = document.createElement('input');
var wrapperSignificados = document.getElementById('wrapperSignificados');
var inputNewSignificado = document.createElement('input');

function addLocal(){
    
    inputNewLocal.setAttribute('id', 'local'+countLocais);
    inputNewLocal.setAttribute('class', 'shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline');
    inputNewLocal.setAttribute('name', 'local'+countLocais);
    inputNewLocal.setAttribute('type', 'text');
    wrapperLocais.appendChild(inputNewLocal);
    countLocais++;
}

function addSignificado(){
    inputNewSignificado.setAttribute('id', 'significado'+countSignificados);
    inputNewSignificado.setAttribute('class', 'shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline');
    inputNewSignificado.setAttribute('name', 'significado'+countSignificados);
    inputNewSignificado.setAttribute('type', 'text');
    wrapperSignificados.appendChild(inputNewSignificado);
    countSignificados++;
}

// function removeLocal(){
    
// }