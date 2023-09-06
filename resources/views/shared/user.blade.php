@auth
<div class="d-flex gap-2 align-items-center justify-content-center">
   <p class="text-light mb-0">  {{ Auth::user()->name }}</p>
   <form action="{{ route('auth.logout')}}" method="post">
    @csrf
    <button class="btn btn-secondary">Se déconnecter</button>
   </form>

</div>

@endauth
@guest
  <a class="text-light" href="{{ route('auth.login') }}">Se connecter</a>
@endguest
