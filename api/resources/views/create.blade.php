@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
      <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold text-center bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Cadastrar nova gíria
            </header>

            <div class="w-full p-6">
                <form class="w-1/2" action="/create/register" method="POST">
                    @csrf
                    <h3 class="text-4xl text-center mb-4 w-100 font-bold text-blue-600">Catalogar nova gíria</h3>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            Nome
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text">
                    </div>
                    <div class="mb-4">
                        <div class="flex">
                            <label class="block text-gray-700 text-sm font-bold mb-2 mr-2" for="locais">
                                Locais
                            </label>
                            <svg onClick="addLocal()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg cursor-pointer" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <div id="wrapperLocais" class="grid grid-cols-3 gap-4">
                            <input id="local1" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="local1" type="text">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex">
                            <label class="block text-gray-700 text-sm font-bold mb-2 mr-2" for="significados">
                                Significados
                            </label>
                            <svg onClick="addSignificado()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg cursor-pointer" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <div id="wrapperSignificados" class="grid grid-cols-1">
                            <input id="significado1" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="significado1" type="text">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="etimolobia">
                            Etimologia
                        </label>
                        <textarea rows="6" name="etimologia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="mb-4">
                        <label
                            class="w-64 flex flex-col items-center px-2 py-4 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white text-blue-600 ease-linear transition-all duration-150">
                            <span class="mt-2 text-base leading-normal">Imagem (opcional)</span>
                            <input type='file' id="imagem" name="imagem" accept="image/png, image/jpeg"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            URL (Youtube/opcional)
                        </label>
                        <input name="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                    </div>
                    <div class="mb-6 flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <style>
        #imagem::-webkit-file-upload-button{
            visibility: hidden;
        }
    </style>
    <script src="{{ asset('js/forms/criarGiria.js')}}"></script>
</main>
@endsection
