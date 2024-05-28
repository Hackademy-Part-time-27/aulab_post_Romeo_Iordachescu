<x-layout>
<div class="container-fluid p-5 bg-info text-center text-white ">
        <div class="row justify-content-center">
            <h1 class="display-1">Bentornato, writer</h1>
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('mesage') }}
    </div>
    @endif
    <div class="container my-5 table-responsive">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli in esame</h2>
                <x-articles-table :articles="$unrevisionedArticles" />
            </div>
        </div>
    </div>
    <div class="container my-5 table-responsive">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli accetati</h2>
                <x-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>
    <div class="container my-5 table-responsive">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-articles-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>