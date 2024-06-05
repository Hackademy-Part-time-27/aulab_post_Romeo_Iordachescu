<div class="card" style="width: 18rem;">
    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover;">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->subtitle }}</p>

        @if($article->category)
            <a href="{{ route('article.byCategory' , ['category' => $article->category->id]) }}" class="small text-muted d-flex justify-content-center align-items-center">
                {{ $article->category->name }}
            </a>
        @else
            <p class="small text-muted fst-italic text-capitalize">
                Non categorizzato
            </p>
        @endif
        <span class="text-muted small fst-italic">timpo di lettura {{$article->readDuration()}} min </span>
        
        @if ($article->tags)

            <p class="small fst-italic text-capitalize">
                @foreach ($article->tags as $tag)
                    #{{$tag->name}}
                @endforeach
            </p>
        @endif
    </div>
    <div class="card-footer text-muted d-flex justify-content-center align-items-center">
        Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y') }} 
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-outline-secondary ">Leggi</a>
    </div>
</div>