<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @layer demo {
          button {
            all : unset;
          }
        }

    </style>
    <title>@yield('title')</title>
</head>
<body>



@php
$routeName = request()->route()->getName()
@endphp

 <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2-lg mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse vstack gap-6" id="navbarNav">
          <ul class="navbar-nav">

            @auth

            <li class="nav-item">
                <a @class(['nav-link', 'active' => str_starts_with($routeName,'admin.option')])  href="{{route('admin.option.index')}}">Gérer les options</a>
              </li>

             <li class="nav-item">
                <a @class(['nav-link', 'active' => str_contains($routeName,'admin.property')])  href="{{ route('admin.property.index')}}">Gérer les biens</a>
              </li>

            @endauth

             <li class="nav-item">
                <a @class(['nav-link', 'active' => str_contains($routeName,'property.index')])  href="{{route('property.index')}}">Biens</a>
              </li>

          </ul>
          <div class="navbar-nav ms-auto mb-2 gap-2 d-flex flex-row align-items-center">
            @include('shared.user')
          </div>

        </div>
      </div>
  </nav>





@yield('main')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    new TomSelect('select[multiple]',{
        plugins : {
            remove_button: { title : 'supprimer'}, // add a remove button to each option
        }
    })
</script>
</body>
</html>
