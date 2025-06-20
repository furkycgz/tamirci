<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tamirci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body  class="container mt-5 pt-4" >
  
 @php
    $ayar = \App\Models\Ayar::first();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5 shadow">
  <div class="container-fluid">
    
    {{-- LOGO --}}
    @if($ayar && $ayar->logo)
        <a class="navbar-brand" href="#">
            <img src="{{ asset($ayar->logo) }}" alt="Logo" height="40" class="d-inline-block align-text-top">
        </a>
    @endif

    {{-- ŞİRKET ADI --}}
    <a class="navbar-brand mx-auto" href="#">{{ $ayar->sirket_adi ?? 'Tamirci' }}</a>

    {{-- TOGGLE BUTTON (Mobil) --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- NAVBAR İÇERİĞİ --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        {{-- GENEL AYARLAR BUTONU --}}
        <li class="nav-item">
          <a href="{{ route('ayar.edit') }}" class="btn btn-outline-light btn-sm">Genel Ayarlar</a>
        </li>

      </ul>
    </div>
  </div>
</nav>



    <div class="container mt-4">
        @yield('content')
    </div>
   

    <footer class="text-center text-muted py-3 mt-5" style="background-color: #f8f9fa;">
    @if(isset($genelAyar) && $genelAyar->adres)
        <div>{{ $genelAyar->adres }}</div>
    @else
        <div>Adres bilgisi girilmedi.</div>
    @endif
</footer>

</body>
</html>

