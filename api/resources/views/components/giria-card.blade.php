<div class="flex justify-center">
  <section class="flex w-3/4 flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

        <header class="font-bold bg-gray-200 text-2xl py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            {{$giria->nome}}
        </header>

        <div class="text-gray-500 font-bold my-2">
            {{$giria->local}}
        </div>

        <hr class="gray-500 mx-5" />

        <div class="py-5 px-5 text-justify text-black">
            @foreach ($giria->significados as $significado)
                <p class="text-xl my-4"><b>{{$loop->index+1}}.</b> {{$significado}}</p>
            @endforeach
        </div>

  </section>
</div>
