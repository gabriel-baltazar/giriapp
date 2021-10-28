@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
      <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold text-center bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                @if(isset($giriaToEdit)) Editar gíria
                @else Cadastrar nova gíria
                @endif
            </header>

            <div class="w-full p-6">
                <form name="formGiria" class="w-1/2" action="{{ old('formGiria', isset($giriaToEdit) ? '/edit/update/'.$giriaToEdit->id : '/create/register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-4xl text-center mb-4 w-100 font-bold text-blue-600">
                        @if(isset($giriaToEdit)) Editar gíria
                        @else Cadastrar nova gíria
                        @endif
                    </h3>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            Nome
                        </label>
                        <input value="{{ old('nome', isset($giriaToEdit) ? $giriaToEdit->nome : '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text">
                    </div>
                    <div class="mb-4">
                        <div class="flex">
                            <label class="block text-gray-700 text-sm font-bold mb-2 mr-2" for="locais">
                                Locais
                            </label>
                            <svg onClick="addLocal()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg cursor-pointer" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                            </svg>
                            <svg onClick="removeLocal()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="cursor-pointer ml-2 bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                            </svg>
                        </div>
                        <div id="wrapperLocais" class="grid grid-cols-3 gap-4">
                        @if(isset($giriaToEdit))
                            @foreach($giriaToEdit->local as $key => $localSingular)
                                <input value="{{$localSingular}}" required id="{{'local'.$key+1}}" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="{{'local'.$key+1}}" type="text">
                            @endforeach
                        @else
                            <input required id="local1" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="local1" type="text">
                        @endif
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
                        @if(isset($giriaToEdit))
                            @foreach($giriaToEdit->significados as $key => $significado)
                                <input value="{{$significado}}" required id="{{'significado'.$key+1}}" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="{{'significado'.$key+1}}" type="text">
                            @endforeach
                        @else
                            <input required id="significado1" class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="significado1" type="text">
                        @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="etimolobia">
                            Etimologia
                        </label>
                        <textarea rows="6" name="etimologia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('etimologia', isset($giriaToEdit) ? $giriaToEdit->etimologia : '') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <span class="mt-2 text-base leading-normal">Imagem (opcional)</span>
                        <input type='file' id="imagem" name="imagem" accept="image/png, image/jpeg"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            URL (Youtube/opcional)
                        </label>
                        <input value="{{ old('url', isset($giriaToEdit) ? 'https://www.youtube.com/watch?v='.$giriaToEdit->videoId : '') }}" name="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" type="text">
                    </div>
                    <div class="mb-6 flex justify-around">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            @if(isset($giriaToEdit)) Editar
                            @else Cadastrar
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/forms/criarGiria.js')}}"></script>
</main>
@endsection
