


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container mx-auto text-center">
    <h1>RepairVault</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto text-center">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('RepairVault.main') }}">Główna </a>
        </li>
        @can('is-admin') 
        <li class="nav-item">
          <a class="nav-link" href="{{ route('repairs.index') }}">Gwarancja</a>
        </li>
      @endcan 
       
       
      </ul>
   @if (Auth::check())
              
                <a class="nav-link btn btn-primary" href="{{ route('logout') }}" >{{ Auth::user()->name }} logout... </a>
                
            @else
                
                    <a class="nnav-link btn btn-primary" href="{{ route('login') }}">Zaloguj się...</a>
               
            @endif
    </div>
  </div>
</nav>
