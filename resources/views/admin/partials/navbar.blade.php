<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        @if(Route::currentRouteName() == 'admin.movies.index' || Route::currentRouteName() == 'admin.movies.show' || Route::currentRouteName() == 'admin.movies.create' || Route::currentRouteName() == 'admin.movies.edit')
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.homePage' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.homePage')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.movies.index' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.index')}}">Lista Film</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.movies.create' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.create')}}">Crea nuovo film</a>
          </li>
        @endif

        @if(Route::currentRouteName() == 'admin.actors.index' || Route::currentRouteName() == 'admin.actors.show' || Route::currentRouteName() == 'admin.actors.create' || Route::currentRouteName() == 'admin.actors.edit')
          <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() == 'admin.homePage' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.homePage')}}">Dashboard</a>
            </li>  
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.actors.index' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.actors.index')}}">Lista Attori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.actors.create' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.actors.create')}}">Aggiungi nuovo attore</a>
          </li>                 
        @endif

        {{-- <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.homePage' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.homePage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.movies.create' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.create')}}">Crea nuovo film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.movies.index' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.index')}}">Lista Film</a>
        </li> --}}
      </ul>
    </div>
  </div>
</nav>