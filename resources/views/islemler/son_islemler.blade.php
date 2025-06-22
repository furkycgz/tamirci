@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Son 5 İşlem</h2>

    @if($sonIslemler->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#İş No</th>
                    <th>Müşteri</th>
                    <th>İşlem</th>
                    <th>Fiyat</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sonIslemler as $islem)
                    <tr>
                        <td>{{ $islem->id }}</td>
                        <td>{{ $islem->musteri->ad_soyad ?? 'Bilinmiyor' }}</td>
                        <td>{{ $islem->yapilan_islem }}</td>
                        <td>{{ number_format($islem->fiyat, 2) }} ₺</td>
                        <td>{{ $islem->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiç işlem yok.</p>
    @endif
</div>
@endsection
