@extends('base.admin')

@section('title','Liste des options')

@section('content')

<div class="d-flex justify-content-between align-items-center">
     <h1>Les options</h1>
     <a class="btn btn-primary" href="{{ route('admin.option.create')}}">Créer une option</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($options as  $option)
        <tr>
            <td>{{$option->name}}</td>

            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                   <a href="{{ route('admin.option.edit',$option)}}" class="btn btn-primary">Éditer</a>
                   <form action="{{ route('admin.option.destroy',$option)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                   </form>
                </div>

            </td>
        </tr>
     @endforeach

    </tbody>

</table>
{{$options->links()}}
@endsection
