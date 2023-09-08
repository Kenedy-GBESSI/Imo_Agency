@extends('base.base')
@section('title','Tous les biens')
@section('content')
@include('shared.flash')
<div class="container-fluid py-4 text-center bg-light">
  <div class="container">
    <form action="" class="d-flex gap-2 align-items-end" method="GET">
            @include('shared.input',['name' => 'title','value' => $input['title'] ?? '','placeholder'=>'Mot clef'])
            @include('shared.input',['name' => 'surface', 'value' => $input['surface'] ?? '','type' => 'number', 'placeholder' => 'Surface minimale'])
            @include('shared.input',['name' => 'price', 'value' => $input['price'] ?? '','placeholder'=> 'Budaget maximal','type' => 'number'])
            @include('shared.input',['name' => 'bedrooms', 'value' => $input['bedrooms'] ?? '','placeholder' => 'Nombre de pièce min','type' => 'number'])
            <button class="btn btn-primary btn-sm flex-grow-0" style="height: 35px">Rechercher</button>
    </form>
  </div>
</div>
<div class="container my-4">
    <h3>Les biens</h3>
    <div class="row hstack gap-md-0 gap-1">
        @forelse ($properties as $property)
            <div class="col-3 mt-2">
                @include('property.card')
            </div>
        @empty
         <p class="fs-4 fw-semibold">Aucun bien disponible</p>
        @endforelse
    </div>
    {{ $properties->links() }}
</div>

@endsection
