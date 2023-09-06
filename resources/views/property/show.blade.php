@extends('base.base')

@section('content')
<div class="container mt-4">
    <div class="row">
       <div class="col-6">

       @include('property.carousel')

       </div>
       <div class="col-6">
        <h1>{{ $property->title}}</h1>
        <h2>{{ $property->rooms_num}} pièces - {{ $property->air_layer }} m²</h2>
        <div class="text-primary fw-bold" style="font-size: 2rem">
            {{ number_format($property->price,thousands_separator : ' ') }} $
        </div>
        @include('shared.flash')
<div class="mt-4">
  <h4>Interressé par ce bien ?</h4>
  <form action="{{ route('property.contact',$property) }}" method="POST" class="vstack gap-3">
    @csrf
    <div class="row">
        <div class="col">
            @include('shared.input',['name' => 'firstname','type'=> 'text','label' => 'Prénom','placeholder' => 'GBESSI'])
        </div>
        <div class="col">
            @include('shared.input',['name' => 'lastname','type'=> 'text','label' => 'Nom','placeholder' => 'Kénédy'])
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('shared.input',['name' => 'phone','type'=> 'tel','label' => 'Téléphone'])
        </div>
        <div class="col">
            @include('shared.input',['name' => 'email','type'=> 'email','label' => 'Email','placeholder' => 'gb@gmail.com'])
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('shared.input',['name' => 'message','type'=> 'textarea','label' => 'Message','placeholder' => 'Je suis ...'])
        </div>
    </div>
    <div class="mt-2">
        <button class="btn btn-primary">Nous contacter</button>
    </div>
  </form>
</div>
 </div>
 </div>


<hr>
<div class="mt-4">
    <p>{{ nl2br($property->description) }}</p>
    <div class="row">
        <div class="col-8">
            <h2>Caractéristiques</h2>
            <table class="table table-striped">
                <tr>
                    <td>Surface habitable</td>
                    <td>{{ $property->air_layer }} m²</td>
                </tr>
                <tr>
                    <td>Pièces</td>
                    <td>{{ $property->bedroom }}</td>
                </tr>
                <tr>
                    <td>Chambres</td>
                    <td>{{ $property->rooms_num }}</td>
                </tr>

                <tr>
                    <td>Etage</td>
                    <td>{{ $property->floor ?: 'Rez de chaussée' }}</td>
                </tr>


                <tr>
                    <td>Adreese</td>
                    <td>{{ $property->address}}</td>
                </tr>

            </table>
        </div>
        <div class="col-4">
            <h2>Spécificités</h2>
            <ul class="list-group">
                @forelse ($property->options as $option)
                 <li class="list-group-item">{{$option->name}}</li>
                @empty
                 Aucune
                @endforelse

            </ul>
        </div>
    </div>
</div>


</div>
@endsection
