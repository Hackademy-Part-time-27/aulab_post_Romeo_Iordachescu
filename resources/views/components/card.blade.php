<div class="card" style="width: 18rem;">
    <img src="{{ Storage::url($image) }}" alt="{{ $title }}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover;">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $subtitle }}</p>
        <a href="{{ $urlCategory }}" class="small text-muted d-flex justify-content-center align-items-center">{{ $category }}</p>
    </div>
    <div class="card-footer text-muted d-flex justify-content-center align-items-center">
        Redatto da {{$user}} il {{$data}} 
        <a href="{{ $url }}" class="btn btn-outline-secondary ">Leggi</a>
    </div>
</div>