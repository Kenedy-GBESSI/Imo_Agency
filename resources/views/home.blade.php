@extends('base.base')

@section('content')
@include('shared.flash')
<div class="container-fluid py-4 text-center bg-light">
  <div class="container">
    <h1>Agency Lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsa quia omnis, dicta velit accusamus id aperiam dolore nemo fugiat, et eius consequuntur optio, placeat deleniti expedita. Cum, inventore iste.</p>
  </div>
</div>
<div class="container my-4">
    <h3>Nos derniers biens</h3>
    <div class="row hstack gap-md-0 gap-1">
        @forelse ($properties as $property)
            <div class="col-md-3 col-12">
                @include('property.card')
            </div>
        @empty
         <p class="fs-4 fw-semibold">Aucun bien disponible</p>
        @endforelse

    </div>
</div>

@endsection
