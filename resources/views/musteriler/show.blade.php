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
        <strong>Model:</strong> {{ $musteri->model }}
    </div>

    <hr>

    <h4>Yapılan İşlemler:</h4>
    @if ($musteri->islemler->count())
        <ul>
            @foreach($musteri->islemler as $islem)
                <li>{{ $islem->yapilan_islem }} - {{ number_format($islem->fiyat, 2) }} ₺</li>
            @endforeach
        </ul>
        <strong class="text-success">Toplam Tutar: {{ number_format($musteri->islemler->sum('fiyat'), 2) }} ₺</strong>
    @else
        <em>Henüz işlem yok.</em>
    @endif
    
    <br><br>
    <a href="{{ route('musteriler.index') }}" class="btn btn-secondary">← Geri Dön</a>
@endsection
