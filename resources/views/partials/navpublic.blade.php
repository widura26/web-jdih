<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">JDIH Desa Tambong</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" aria-current="page" href="{{ route('public.dashboard') }}">Home</a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle {{ ($active === "kategori") ? 'active' : '' }}" href="/kategori" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($category as $item)
            <li><a class="dropdown-item text-center position-relative" href="{{ route('public.dokBasedKategori', $item->jenis) }}">{{ $item->singkatan }}</a></li>
            @endforeach
          </ul>
          
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($active === "login") ? 'active' : '' }}" href="{{ route('loginView') }}">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($active === "contact") ? 'active' : '' }}" href="{{ route('public.contact') }}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>