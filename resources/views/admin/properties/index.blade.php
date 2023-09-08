@extends('base.admin')

@section('title','Liste des biens')

@section('content')

<div class="d-flex justify-content-between align-items-center">
     <h1>Les biens</h1>
     <a class="btn btn-primary" href="{{ route('admin.property.create')}}">Créer un bien</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Est vendu ?</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($properties as  $property)
        <tr>
            <td>{{$property->title}}</td>
            <td>{{$property->air_layer}}m²</td>
            <td>{{number_format($property->price, thousands_separator:' ')}}</td>
            <td>{{$property->sold ? 'Oui' : 'Non'}}</td>
            <td>{{$property->city}}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                   <a href="{{ route('admin.property.edit',$property)}}" class="btn btn-primary">Éditer</a>
                   <form action="{{ route('admin.property.destroy',$property->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        @if ($property->trashed())
                             Supprimer définitivement
                        @else
                           Supprimer
                        @endif
                    </button>
                   </form>

                   @if ($property->trashed())

                   <form action="{{ route('admin.property.restore',$property->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success">
                        Restorer
                    </button>
                   </form>

                   @endif




                </div>

            </td>
        </tr>
     @endforeach

    </tbody>

</table>
{{$properties->links()}}
@endsection
