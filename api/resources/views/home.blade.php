@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold text-center bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Seja bem-vindo {{ Auth::user()->name }}!
            </header>

            <div class="w-full p-6">
                <div class="grid grid-cols-3 gap-2">
                    @foreach ($giriasDesseUsuario as $giriaDesseUsuario)
                        <div class="flex flex-col">
                            <x-giria-card :giria="$giriaDesseUsuario" />
                            <button type="submit" class="bg-blue-500 hover:bg-red-700 text-white w-1/4 mx-auto font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Excluir
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
