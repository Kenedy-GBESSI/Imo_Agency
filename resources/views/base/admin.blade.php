@extends('base.layout')

@section('main')
  <div class="container">
   @include('shared.flash')
   @yield('content')
  </div>
@endsection
