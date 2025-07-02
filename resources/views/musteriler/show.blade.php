@extends('layouts.app')

@section('content')
<h2>Müşteri Detayları</h2>

<div>
    <strong>Ad Soyad:</strong> {{ $musteri->ad_soyad }}<br>
    <strong>Telefon:</strong> {{ $musteri->telefon }}<br>
    <strong>Plaka:</strong> {{ $musteri->plaka }}<br>
</div>

<hr>

<h4>Yapılan İşlemler</h4>
@if($islemler->count())
<ul>
    @foreach($islemler as $islem)
        <li>{{ $islem->created_at->format('d.m.Y H:i') }} – {{ $islem->yapilan_islem }} – {{ number_format($islem->fiyat, 2) }} ₺</li>
    @endforeach
</ul>
@else
<p>İşlem bulunamadı.</p>
@endif

<hr>

<h4>Ödeme Geçmişi</h4>
@if($musteri->odemeler->count())
<ul>
    @foreach($musteri->odemeler as $odeme)
        <li>{{ $odeme->created_at->format('d.m.Y H:i') }} – {{ number_format($odeme->tutar, 2) }} ₺ – <em>{{ $odeme->aciklama }}</em></li>
    @endforeach
</ul>
@else
<p>Henüz ödeme yapılmamış.</p>
@endif

<hr>

<h4>Yeni Ödeme Ekle</h4>
<form action="{{ route('odemeler.store', $musteri->id) }}" method="POST" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="tutar" class="form-label">Tutar</label>
        <input type="number" step="0.01" name="tutar" id="tutar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="aciklama" class="form-label">Açıklama</label>
        <input type="text" name="aciklama" id="aciklama" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Ödeme Ekle</button>
    <a href="{{ route('musteriler.hesap') }}" class="btn btn-primary ms-2">Hesap Sayfasına Git</a>
</form>


<br>
<a href="{{ route('musteriler.index') }}" class="btn btn-secondary">← Geri Dön</a>
@endsection
