<div class="card">
    @php
        $image = $property->getImage()
    @endphp
    @if ($image)
    <img src="{{ $property->getUrl($image->path) }}" class="card-img-top" alt="...">
    @else
    <img src="{{asset('assets/default.jpg')}}" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <a href="{{route('property.show',[
            'slug' => $property->slug,
            'property'=> $property->id
        ])}}" class="fw-bold">{{ $property->title }}</a>
        <p>{{ $property->air_layer }}m² - {{ $property->city}} ({{ $property->address}})</p>

        <p class="text-primary fs-2 fw-bold">{{ number_format($property->price, thousands_separator : ' ') }} $</p>
    </div>
</div>
