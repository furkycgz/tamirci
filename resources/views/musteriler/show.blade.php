@extends('layouts.app')

@section('content')
    <h2>Müşteri Detayları</h2>

    <div class="mb-3">
        <strong>Ad Soyad:</strong> {{ $musteri->ad_soyad }}
    </div>

    <div class="mb-3">
        <strong>Telefon:</strong> {{ $musteri->telefon }}
    </div>

    <div class="mb-3">
        <strong>Plaka:</strong> {{ $musteri->plaka }}
    </div>

    <div class="mb-3">
       <h4>Araç Geçmişi</h4>
<ul>
    @foreach ($musteri->aracGecmisleri as $arac)
        <li>
            {{ $arac->model }} - {{ $arac->plaka }}
            <small class="text-muted">({{ $arac->created_at->format('d.m.Y H:i') }})</small>
        </li>
    @endforeach
    <li>
        <strong>{{ $musteri->model }} - {{ $musteri->plaka }} (Güncel)</strong>
    </li>
</ul>



    </div>

    <hr>

    <h4>Yapılan İşlemler</h4>
@if($islemler->count())
    <ul>
        @foreach($islemler as $islem)
            <li>
                {{ $islem->created_at->format('d.m.Y H:i') }} – 
                {{ $islem->yapilan_islem }} – 
                {{ number_format($islem->fiyat, 2) }} ₺
            </li>
        @endforeach
    </ul>
@else
    <p>İşlem bulunamadı.</p>
@endif

    <br><br>
    <a href="{{ route('musteriler.index') }}" class="btn btn-secondary">← Geri Dön</a>
@endsection
