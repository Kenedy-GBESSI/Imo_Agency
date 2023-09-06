<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    @php
        $image = $property->getImage()
    @endphp

    <div class="carousel-inner">
      <div class="carousel-item active">
    @if ($image)
    <img  src="{{ $property->getUrl($image->path) }}" class="card-img-top" alt="...">
    @else
    <img src="{{asset('assets/default.jpg')}}" class="card-img-top" alt="...">
    @endif
    </div>
    @foreach ($property->images as $value)
     @if ($value->id !== $image->id )
      <div class="carousel-item">
        <img src="{{ $property->getUrl($value->path) }}" class="card-img-top" alt="..">
      </div>
      @else
      @continue
     @endif

    @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
