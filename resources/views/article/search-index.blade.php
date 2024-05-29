<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white ">
        <div class="row justify-content-center">
            <h1 class="display-1">Tutti gli articoli: {{ $query }} </h1>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                    <x-card

                    :article="$article"
                    
                    />
            </div>
            @endforeach
        </div>
    </div>
</x-layout>