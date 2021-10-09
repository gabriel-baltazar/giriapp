
var countLocais = 2
var countSignificados = 2

function addLocal(){
    var wrapperLocais = document.getElementById('wrapperLocais');

    wrapperLocais.innerHTML += 
    "<input id='local"+countLocais+"' class='shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline' name='local"+countLocais+"' type='text'>";
    
    countLocais++;
}

function addSignificado(){
    var wrapperSignificados = document.getElementById('wrapperSignificados');

    wrapperSignificados.innerHTML += 
    "<input id='significado"+countSignificados+"' class='shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline' name='significado"+countSignificados+"' type='text'>";

    countSignificados;
}