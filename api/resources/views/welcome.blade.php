@extends('layouts.facade')

@section('content')
    <div class=" my-10 flex flex-col items-center justify-center">

      <!-- Banner e propaganda principal -->
      <div class="w-full bg-blue-600 text-white py-10 h-full text-center">
        <div class="mx-auto w-100 px-2 lg:w-2/4">
          <div class='text-6xl mb-4 font-bold'>GiriAPI.</div>
          <div class="text-lg leading-8">
            O GiriApp é o seu dicionário digital de provérbios populares regionais
            de plataforma intuitiva e simples, que cataloga e significa as expressões mais usadas em cada estado do Brasil.
          </div>
        </div>
      </div>

      <!-- Expressão do dia -->
      <div class="lg:flex w-full text-blue-600 py-10 h-full text-center">
        <div class="mx-auto w-100 px-5 pb-10 lg:w-2/4">
          <div class='text-6xl mb-4 font-bold'>Expressão do dia</div>
          <div class="text-lg leading-8 lg:px-20">
            Receba uma dose de cultura todos os dias com o nosso serviço de newsletter que traz uma expressão e seu significado
            na sua caixa de email diariamente (EM BREVE).
          </div>
        </div>
        <div class="mx-auto w-100 px-5 pt-4 lg:w-2/4">
          @if ($giriaHoje != '')
            <div class='text-4xl mb-4 w-100 font-bold'>A expressão de hoje é:</div>
              <x-giria-card :giria="$giriaHoje" />
          @else
            <div class='text-4xl mb-4 w-100 font-bold'>Houve um problema na exibição do conteúdo da página,
              favor contatar o administrador
            </div>
            </div>
          @endif
        </div>
      </div>

    </div>
@endsection
