<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white ">
        <div class="row justify-content-center">
            <h1 class="display-1">The Aulab Post</h1>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message')}}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-sm-6 col-md-3">
                    <x-card
                 
                    :article="$article"
                    
                    />
            </div>
            @endforeach
        </div>
    </div>
</x-layout>