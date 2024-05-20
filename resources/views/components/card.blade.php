<div class="card">
    <img src="{{ Storage::url($image) }}" alt="" class="card-img-top card-body">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $subtitle }}</p>
        <a href="{{ $urlCategory }}" class="small text-muted d-flex justify-content-center align-items-center">{{ $category }}</p>
    </div>
    <div class="card-footer text-muted d-flex justify-content-center align-items-center">
        Redatto il {{ $data }} da {{ $user}}
        <a href="{{ $url }}" class="btn btn-outline-secondary">Leggi</a>
    </div>
</div>