@extends('base.admin')

@section('title',$property->exists ? 'édition de bien' : 'création de bien')

@section('content')

<div class="container">
    <h4>{{ $property->exists ? 'Éditer le bien' : 'Créer le bien'}}</h4>
     @include('form.property')
</div>

@endsection
