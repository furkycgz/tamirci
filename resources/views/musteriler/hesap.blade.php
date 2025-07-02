@extends('layouts.app')

@section('content')
<h2>Müşteri Borç Durumu</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Toplam Borç</th>
            <th>Ödenen</th>
            <th>Kalan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($musteriler as $musteri)
            @php
                $toplamBorç = $musteri->islemler->sum('fiyat');
                $toplamÖdeme = $musteri->odemeler->sum('tutar');
                $kalan = $toplamBorç - $toplamÖdeme;
            @endphp
            <tr>
                <td>{{ $musteri->ad_soyad }}</td>
                <td>{{ number_format($toplamBorç, 2) }} ₺</td>
                <td>{{ number_format($toplamÖdeme, 2) }} ₺</td>
                <td>{{ number_format($kalan, 2) }} ₺</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('musteriler.index') }}" class="btn btn-secondary">← Geri Dön</a>
@endsection
