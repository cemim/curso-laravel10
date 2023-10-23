<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container-fluid">        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home.*') ? 'active' : ''}}" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('produtos.*') ? 'active' : ''}}"  aria-current="page" href="{{ route('produtos.indexView') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('categorias.*') ? 'active' : ''}}" aria-current="page" href="{{ route('categorias.index') }}">Categorias</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
