@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $musteri->ad_soyad }} - İşlemler</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($islemler->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#İş No</th>
                    <th>İşlem</th>
                    <th>Fiyat</th>
                    <th>Tarih</th>
                    <th>Sil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($islemler as $islem)
                    <tr>
                        <td>{{ $islem->kullanici_islem_no}}</td>
                        <td>{{ $islem->yapilan_islem }}</td>
                        <td>{{ number_format($islem->fiyat, 2) }} ₺</td>
                        <td>{{ $islem->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <form action="{{ route('islemler.destroy', $islem->id) }}" method="POST" onsubmit="return confirm('İşlem silinsin mi?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiç işlem yok.</p>
    @endif

    <a href="{{ route('musteriler.index') }}" class="btn btn-secondary mt-3">Geri Dön</a>
</div>
@endsection
