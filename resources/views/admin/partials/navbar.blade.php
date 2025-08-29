<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.homePage' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.homePage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.movies.create' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.create')}}">Crea nuovo film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'admin.movies.index' ? 'navbar-brand' : ''}}" aria-current="page" href="{{route('admin.movies.index')}}">Lista Film</a>
        </li>
      </ul>
    </div>
  </div>
</nav>