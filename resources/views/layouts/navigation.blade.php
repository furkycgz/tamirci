@php
    use App\Models\SirketAyar;

    $sirketAdi = 'Laravel';
    if (auth()->check()) {
        $ayar = SirketAyar::where('user_id', auth()->id())->first();
        $sirketAdi = $ayar->sirket_adi ?? 'Laravel';
    }
@endphp
@if (!request()->is('login') && !request()->is('register'))
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
         @if(isset($ayar->logo))
         <img src="{{ asset('storage/' . $ayar->logo) }}" alt="Logo" height="40" width="40" class="rounded-circle me-2" style="object-fit: cover;" />
        @endif

        {{-- Şirket adı solda --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            {{ $sirketAdi }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('musteriler.*') ? 'active' : '' }}" href="{{ route('musteriler.index') }}">Müşteriler</a>
                </li>
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('musteriler.*') ? 'active' : '' }}"  href="{{ route('musteriler.hesap') }}" >Hesap Sayfasına Git</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ayar.*') ? 'active' : '' }}" href="{{ route('ayar.edit') }}">Ayarlar</a>
                </li>
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    @if(Auth::check())
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Çıkış</button>
                    </form>
                </li>
            </ul>
        </li>
    @else
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Giriş</a></li>
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Kayıt Ol</a></li>
    @endif
</ul>

        </div>
    </div>
</nav>
@endif