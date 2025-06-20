@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Müşteriler</h2>
    <a href="{{ route('musteriler.create') }}" class="btn btn-primary">+ Yeni Müşteri Ekle</a>
</div>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Telefon</th>
            <th>Plaka</th>
            <th>Model</th>
            <th>Toplam Fiyat</th>
            <th>DÜZENLE</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($musteriler as $musteri)
            <tr>
                <td>{{ $musteri->ad_soyad }}</td>
                <td>{{ $musteri->telefon }}</td>
                <td>{{ $musteri->plaka }}</td>
                <td>{{ $musteri->model }}</td>
                <td>
                    @if($musteri->islemler->count())
                        {{ number_format($musteri->islemler->sum('fiyat'), 2) }} ₺
                    @else
                        -
                    @endif
                </td>
                <td>
                    <ul>
                        <li><a href="{{ route('musteriler.islem.create', $musteri->id) }}" class="btn btn-sm btn-success">İşlem Ekle</a></li>
                        <br>
                        <li><a href="{{ route('musteriler.edit', $musteri->id) }}" class="btn btn-sm btn-warning">Düzenle</a></li>
                        <br>
                        <li><a href="{{ route('musteriler.show', $musteri->id) }}" class="btn btn-sm btn-info">Detay</a></li>
                        <br>
                        <li><a href="{{ route('musteriler.islemler.index', $musteri->id) }}" class="btn btn-sm btn-danger">İşlem Sil</a></li> 
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
