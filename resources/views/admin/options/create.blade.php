@extends('base.admin')

@section('title',$option->exists ? 'édition d\'option' : 'création d\'option')

@section('content')

<div class="container">
    <h4>{{ $option->exists ? 'Édition d\'option' : 'Création d\'option'}}</h4>
     @include('form.option')
</div>

@endsection
